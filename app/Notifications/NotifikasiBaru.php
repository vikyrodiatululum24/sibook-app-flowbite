<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NotifikasiBaru extends Notification
{
    use Queueable;

    protected $pesan;

    public function __construct($pesan)
    {
        $this->pesan = $pesan;
    }

    public function via($notifiable)
    {
        return ['database']; // Simpan ke tabel notifications
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->pesan,
            'url' => '/dashboard' // Bisa diubah sesuai kebutuhan
        ];
    }
}
