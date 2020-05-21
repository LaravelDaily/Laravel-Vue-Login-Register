<?php

namespace App\Notifications;

use Illuminate\Support\Facades\Crypt;

class VerifyEmail extends \Illuminate\Auth\Notifications\VerifyEmail
{
    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        $hash = Crypt::encrypt($notifiable->getKey());

        return config('frontend.email_verify_url') . $hash;
    }
}
