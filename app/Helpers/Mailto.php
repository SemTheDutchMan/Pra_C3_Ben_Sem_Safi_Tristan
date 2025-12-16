<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class Mailto
{
    /**
     * Send an email notification
     * 
     * @param string $email The recipient email address
     * @param string $subject The email subject
     * @param string $body The email body/message
     * @return bool Whether the email was sent successfully
     */
    public static function send(string $email, string $subject, string $body): bool
    {
        try {
            Mail::raw($body, function ($message) use ($email, $subject) {
                $message->to($email)
                    ->subject($subject);
            });
            return true;
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
            return false;
        }
    }
}
