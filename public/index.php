<?php

declare(strict_types=1);

/**
 * DAOZ360 — Laravel Entry Point & Standalone PHP Router Fallback
 *
 * When installed inside a full Laravel application (vendor/autoload.php exists),
 * this boots the standard Laravel HTTP Kernel. When run directly via PHP's
 * built-in server (`php -S 127.0.0.1:8000 -t public`) without Composer vendor
 * packages, it routes all pages and JSON API endpoints natively.
 */

define('LARAVEL_START', microtime(true));

$autoloadPath = __DIR__ . '/../vendor/autoload.php';
$bootstrapPath = __DIR__ . '/../bootstrap/app.php';

if (file_exists($autoloadPath) && file_exists($bootstrapPath)) {
    require $autoloadPath;
    $app = require_once $bootstrapPath;
    $app->handleRequest(\Illuminate\Http\Request::capture());
    exit;
}

// Standalone PHP Router Fallback (when running without vendor/ directory)
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

// Serve static files directly when using PHP built-in web server
if (php_sapi_name() === 'cli-server') {
    $staticCandidate = realpath(__DIR__ . $uri);
    if ($staticCandidate && is_file($staticCandidate) && str_starts_with($staticCandidate, realpath(__DIR__))) {
        return false;
    }
}

// Handle POST API endpoints
if ($method === 'POST') {
    header('Content-Type: application/json; charset=utf-8');
    $rawBody = file_get_contents('php://input') ?: '{}';
    $payload = json_decode($rawBody, true) ?? $_POST;

    if ($uri === '/api/chat/leads') {
        $sessionId = 'ses_' . bin2hex(random_bytes(6));
        $leadId = 'lead_' . bin2hex(random_bytes(5));
        echo json_encode([
            'success'   => true,
            'sessionId' => $sessionId,
            'leadId'    => $leadId,
        ]);
        exit;
    }

    if ($uri === '/api/chat/requests') {
        $topic = $payload['topic'] ?? 'general';
        $prefix = $topic === 'pricing' ? 'PRC' : ($topic === 'demo' ? 'DMO' : 'SPT');
        $reference = $payload['reference'] ?? ('DAOZ-' . $prefix . '-' . gmdate('ymd') . '-' . random_int(1000, 9999));
        echo json_encode([
            'success'   => true,
            'reference' => $reference,
        ]);
        exit;
    }

    if ($uri === '/contact/submit' || $uri === '/api/contact') {
        $reference = 'DAOZ-INQ-' . gmdate('ymd') . '-' . random_int(1000, 9999);
        echo json_encode([
            'success'   => true,
            'reference' => $reference,
            'message'   => "Thank you! Your inquiry ({$reference}) has been received by our team.",
        ]);
        exit;
    }
}

// Clean route matching for GET requests
$cleanRoute = trim(strtolower($uri), '/');

$routeMap = [
    ''                 => __DIR__ . '/../index.html',
    'home'             => __DIR__ . '/../index.html',
    'privacy-policy'   => __DIR__ . '/../privacy-policy/index.html',
    'privacy'          => __DIR__ . '/../privacy-policy/index.html',
    'terms-conditions' => __DIR__ . '/../terms-conditions/index.html',
    'terms'            => __DIR__ . '/../terms-conditions/index.html',
    'contact'          => __DIR__ . '/../contact/index.html',
];

$targetFile = $routeMap[$cleanRoute] ?? __DIR__ . '/../index.html';

if (file_exists($targetFile)) {
    header('Content-Type: text/html; charset=utf-8');
    readfile($targetFile);
    exit;
}

http_response_code(404);
echo '404 Not Found';
