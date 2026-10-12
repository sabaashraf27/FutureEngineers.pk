<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    /**
     * Show the About page.
     */
    public function about()
    {
        return view('pages.about');
    }

    /**
     * Show the Contact page.
     */
    public function contact()
    {
        return view('pages.contact');
    }

    /**
     * Show the Terms of Service page.
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Show the Privacy Policy page.
     */
    public function privacy()
    {
        return view('pages.privacy');
    }

    /**
     * Handle a contact form submission.
     */
    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],
            'inquiry_type' => ['required', 'string', 'max:100'],
            'subject' => ['nullable', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:5000'],
            'consent' => ['accepted'],
        ], [
            'inquiry_type.required' => 'Please select an inquiry type.',
            'consent.accepted' => 'Please confirm your consent to continue.',
        ]);

        $contactMessage = ContactMessage::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'inquiry_type' => $validated['inquiry_type'],
            'subject' => $validated['subject'] ?? null,
            'message' => $validated['message'],
        ]);

        // Best-effort notification email to the FutureEngineers.pk inbox.
        // Wrapped so that a missing/unconfigured mail driver never breaks the
        // submission — the message is always saved to the database above.
        try {
            Mail::raw(
                "New contact message from {$contactMessage->name} ({$contactMessage->email})\n\n"
                    . "Inquiry type: {$contactMessage->inquiry_type}\n"
                    . "Subject: " . ($contactMessage->subject ?: '—') . "\n\n"
                    . $contactMessage->message,
                function ($mail) use ($contactMessage) {
                    $mail->to('Futureengineers.pk@gmail.com')
                        ->subject('New Contact Message: ' . ($contactMessage->subject ?: $contactMessage->inquiry_type))
                        ->replyTo($contactMessage->email, $contactMessage->name);
                }
            );
        } catch (\Throwable $e) {
            Log::warning('Contact form email could not be sent: ' . $e->getMessage());
        }

        return redirect()
            ->route('contact')
            ->with('contact_success', "Thank you, {$contactMessage->name}! Your message has been sent — we'll get back to you soon.");
    }
}
