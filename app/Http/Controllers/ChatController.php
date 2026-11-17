<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    /**
     * Initialize a pre-chat lead session (/api/chat/leads).
     */
    public function createLead(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => ['required', 'string', 'min:1', 'max:80'],
            'email'   => ['required', 'email', 'max:150'],
            'company' => ['nullable', 'string', 'max:120'],
        ]);

        $sessionId = 'ses_' . strtolower(Str::random(12));
        $leadId    = 'lead_' . strtolower(Str::random(10));

        try {
            if (Schema::hasTable('chat_leads')) {
                DB::table('chat_leads')->insert([
                    'lead_id'    => $leadId,
                    'session_id' => $sessionId,
                    'name'       => trim($validated['name']),
                    'email'      => trim($validated['email']),
                    'company'    => isset($validated['company']) ? trim($validated['company']) : null,
                    'ip_address' => $request->ip(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('DAOZ360 chat lead DB insert skipped: ' . $e->getMessage());
        }

        return response()->json([
            'success'   => true,
            'sessionId' => $sessionId,
            'leadId'    => $leadId,
        ]);
    }

    /**
     * Validate session and return an approved response or next workflow state (/api/chat/messages).
     */
    public function handleMessage(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'sessionId' => ['required', 'string', 'max:80'],
            'message'   => ['required', 'string', 'max:1000'],
            'currency'  => ['nullable', 'string', 'in:INR,USD'],
        ]);

        $currency = $validated['currency'] ?? config('daoz360.pricing.default_currency', 'INR');
        $mode     = config('daoz360.pricing.mode', 'quote');
        $starter  = config("daoz360.pricing.plans.starter.prices.{$currency}.monthly_formatted", '₹999');
        $growth   = config("daoz360.pricing.plans.growth.prices.{$currency}.monthly_formatted", '₹2,499');
        $agency   = config("daoz360.pricing.plans.agency.prices.{$currency}.monthly_formatted", '₹5,999');

        $pricingReply = $mode === 'ready'
            ? "Starter is {$starter}/month, Growth is {$growth}/month, and Agency is {$agency}/month before applicable taxes. Yearly options are available. How many social accounts and people do you need?"
            : "Our proposed packages start at {$starter}/month. Starter includes five accounts and one user; Growth supports small teams, and Agency supports larger account portfolios. Would you like help choosing a package?";

        return response()->json([
            'success'      => true,
            'sessionId'    => $validated['sessionId'],
            'pricingReply' => $pricingReply,
        ]);
    }

    /**
     * Store a follow-up request from the chat assistant (/api/chat/requests).
     * Uses idempotency key / reference deduplication so retries do not create duplicates.
     */
    public function submitRequest(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'sessionId'      => ['nullable', 'string', 'max:80'],
            'idempotencyKey' => ['nullable', 'string', 'max:100'],
            'name'           => ['required', 'string', 'max:80'],
            'email'          => ['required', 'email', 'max:150'],
            'company'        => ['nullable', 'string', 'max:120'],
            'topic'          => ['required', 'string', 'max:50'],
            'details'        => ['nullable', 'array'],
            'customNotes'    => ['nullable', 'string', 'max:2000'],
            'reference'      => ['nullable', 'string', 'max:60'],
        ]);

        $prefix = match ($validated['topic']) {
            'pricing' => 'PRC',
            'demo'    => 'DMO',
            default   => 'SPT',
        };

        $reference = $validated['reference']
            ?? ('DAOZ-' . $prefix . '-' . now()->format('ymd') . '-' . random_int(1000, 9999));

        try {
            if (Schema::hasTable('chat_requests')) {
                $existing = DB::table('chat_requests')
                    ->where('reference', $reference)
                    ->first();

                if ($existing) {
                    return response()->json([
                        'success'      => true,
                        'reference'    => $existing->reference,
                        'deduplicated' => true,
                    ]);
                }

                DB::table('chat_requests')->insert([
                    'reference'    => $reference,
                    'session_id'   => $validated['sessionId'] ?? 'ses_web',
                    'name'         => trim($validated['name']),
                    'email'        => trim($validated['email']),
                    'company'      => isset($validated['company']) ? trim($validated['company']) : null,
                    'topic'        => $validated['topic'],
                    'details'      => json_encode($validated['details'] ?? []),
                    'custom_notes' => $validated['customNotes'] ?? null,
                    'status'       => 'New',
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('DAOZ360 chat request DB insert skipped: ' . $e->getMessage());
        }

        return response()->json([
            'success'   => true,
            'reference' => $reference,
        ]);
    }
}
