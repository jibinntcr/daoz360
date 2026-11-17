<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class ContactController extends Controller
{
    /**
     * Handle contact modal & contact portal form submissions.
     */
    public function submit(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['required', 'email', 'max:150'],
            'company'  => ['nullable', 'string', 'max:150'],
            'channels' => ['nullable', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:80'],
            'message'  => ['required', 'string', 'max:5000'],
        ]);

        $reference = 'DAOZ-INQ-' . now()->format('ymd') . '-' . random_int(1000, 9999);

        try {
            if (Schema::hasTable('contact_inquiries')) {
                DB::table('contact_inquiries')->insert([
                    'reference'  => $reference,
                    'name'       => $validated['name'],
                    'email'      => $validated['email'],
                    'company'    => $validated['company'] ?? null,
                    'channels'   => $validated['channels'] ?? null,
                    'category'   => $validated['category'] ?? 'Product Enquiry',
                    'message'    => $validated['message'],
                    'ip_address' => $request->ip(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        } catch (\Throwable $e) {
            Log::warning('DAOZ360 contact inquiry DB insert skipped: ' . $e->getMessage());
        }

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success'   => true,
                'reference' => $reference,
                'message'   => "Thank you! Your inquiry ({$reference}) has been received by our team.",
            ]);
        }

        return back()->with('status', "Thank you! Your inquiry ({$reference}) has been received.");
    }
}
