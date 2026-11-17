import http from 'http';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const __filename = fileURLToPath(import.meta.url);
const __dirname = path.dirname(__filename);
const rootDir = path.resolve(__dirname, '..');
const PORT = Number(process.env.PORT || 5173);
const HOST = process.env.HOST || '127.0.0.1';

const savedReferences = new Map();

const MIME_TYPES = {
  '.html': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'application/javascript; charset=utf-8',
  '.json': 'application/json; charset=utf-8',
  '.webmanifest': 'application/manifest+json; charset=utf-8',
  '.xml': 'application/xml; charset=utf-8',
  '.txt': 'text/plain; charset=utf-8',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.svg': 'image/svg+xml',
  '.ico': 'image/x-icon'
};

function sendJson(res, statusCode, payload) {
  res.writeHead(statusCode, { 'Content-Type': 'application/json; charset=utf-8' });
  res.end(JSON.stringify(payload));
}

const server = http.createServer((req, res) => {
  const parsedUrl = new URL(req.url || '/', `http://${HOST}:${PORT}`);
  const pathname = decodeURIComponent(parsedUrl.pathname);

  // Redirect /home -> / (Section 11D)
  if ((pathname === '/home' || pathname === '/home/') && req.method === 'GET') {
    res.writeHead(301, { Location: '/' });
    res.end();
    return;
  }

  // API endpoints (Section 12G)
  if (pathname === '/api/chat/leads' && req.method === 'POST') {
    let body = '';
    req.on('data', (chunk) => (body += chunk));
    req.on('end', () => {
      try {
        const data = JSON.parse(body || '{}');
        const name = (data.name || '').trim();
        const email = (data.email || '').trim();
        if (!name || name.length > 80 || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
          return sendJson(res, 422, { success: false, error: 'Validation failed' });
        }
        const sessionId = `ses_${Date.now().toString(36)}_${Math.random().toString(36).substring(2, 8)}`;
        const leadId = `lead_${Date.now().toString(36)}`;
        return sendJson(res, 200, { success: true, sessionId, leadId });
      } catch (e) {
        return sendJson(res, 400, { success: false, error: 'Invalid JSON' });
      }
    });
    return;
  }

  if (pathname === '/api/chat/messages' && req.method === 'POST') {
    let body = '';
    req.on('data', (chunk) => (body += chunk));
    req.on('end', () => {
      try {
        const data = JSON.parse(body || '{}');
        return sendJson(res, 200, {
          success: true,
          sessionId: data.sessionId || 'ses_active'
        });
      } catch (e) {
        return sendJson(res, 400, { success: false, error: 'Invalid JSON' });
      }
    });
    return;
  }

  if (pathname === '/api/chat/requests' && req.method === 'POST') {
    let body = '';
    req.on('data', (chunk) => (body += chunk));
    req.on('end', () => {
      try {
        const data = JSON.parse(body || '{}');
        const idemKey = data.idempotencyKey || data.reference;
        if (idemKey && savedReferences.has(idemKey)) {
          return sendJson(res, 200, {
            success: true,
            reference: savedReferences.get(idemKey),
            deduplicated: true
          });
        }
        const randomSuffix = Math.floor(1000 + Math.random() * 9000);
        const dateStamp = new Date().toISOString().slice(2, 10).replace(/-/g, '');
        const reference = data.reference || `DAOZ-REQ-${dateStamp}-${randomSuffix}`;
        if (idemKey) {
          savedReferences.set(idemKey, reference);
        }
        return sendJson(res, 200, { success: true, reference });
      } catch (e) {
        return sendJson(res, 400, { success: false, error: 'Invalid JSON' });
      }
    });
    return;
  }

  if ((pathname === '/contact/submit' || pathname === '/api/contact') && req.method === 'POST') {
    let body = '';
    req.on('data', (chunk) => (body += chunk));
    req.on('end', () => {
      const randomSuffix = Math.floor(1000 + Math.random() * 9000);
      const dateStamp = new Date().toISOString().slice(2, 10).replace(/-/g, '');
      const reference = `DAOZ-INQ-${dateStamp}-${randomSuffix}`;
      return sendJson(res, 200, {
        success: true,
        reference,
        message: `Thank you! Your inquiry (${reference}) has been received by our team.`
      });
    });
    return;
  }

  // Static file resolution (checks root first, then public/)
  const cleanRel = pathname.replace(/^\/+/, '');
  const candidatePaths = [];

  if (!cleanRel) {
    candidatePaths.push(path.join(rootDir, 'index.html'));
  } else {
    candidatePaths.push(
      path.join(rootDir, cleanRel),
      path.join(rootDir, cleanRel, 'index.html'),
      path.join(rootDir, `${cleanRel}.html`),
      path.join(rootDir, 'public', cleanRel),
      path.join(rootDir, 'public', cleanRel, 'index.html')
    );
  }

  for (const candidate of candidatePaths) {
    if (fs.existsSync(candidate) && fs.statSync(candidate).isFile()) {
      const ext = path.extname(candidate).toLowerCase();
      const contentType = MIME_TYPES[ext] || 'application/octet-stream';
      res.writeHead(200, { 'Content-Type': contentType });
      fs.createReadStream(candidate).pipe(res);
      return;
    }
  }

  // Serve helpful 404 page (Section 11F)
  const notFoundPath = path.join(rootDir, '404.html');
  if (fs.existsSync(notFoundPath)) {
    res.writeHead(404, { 'Content-Type': 'text/html; charset=utf-8' });
    fs.createReadStream(notFoundPath).pipe(res);
    return;
  }

  res.writeHead(404, { 'Content-Type': 'text/plain; charset=utf-8' });
  res.end('404 Not Found');
});

server.listen(PORT, HOST, () => {
  console.log(`DAOZ360 server listening at http://${HOST}:${PORT}/`);
});
