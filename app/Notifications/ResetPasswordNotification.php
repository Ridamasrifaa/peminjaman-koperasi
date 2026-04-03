<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url('/reset-password/'.$this->token.'?email='.$notifiable->email);

        return (new MailMessage)
            ->subject('Reset Password Koperasi SMKN 4 Tasikmalaya')
            ->greeting('Halo!')
            ->line('Kami menerima permintaan untuk mereset password akun kamu.')
            ->action('Reset Password', $url)
            ->line('Link ini hanya berlaku selama 60 menit.')
            ->line('Jika kamu tidak meminta reset password, abaikan saja email ini.')
            ->salutation('Koperasi SMKN 4 Tasikmalaya');
    }
}