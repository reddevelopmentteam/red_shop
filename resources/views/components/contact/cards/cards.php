<?php

use Livewire\Component;

new class extends Component
{
    public array $contactCards = [
        [
            'channel' => 'WhatsApp',
            'icon' => 'mdi:whatsapp',
            'description' => 'Respon tercepat ±10 menit di jam kerja',
            'cta' => 'Chat Sekarang',
            'url' => 'https://wa.me/6281234567890',
            'color' => 'green',
        ],
        [
            'channel' => 'Instagram',
            'icon' => 'mdi:instagram',
            'description' => 'Kirim DM untuk pertanyaan atau diskusi',
            'cta' => 'Kunjungi Instagram',
            'url' => 'https://instagram.com/redshop',
            'color' => 'pink',
        ],
        [
            'channel' => 'Email',
            'icon' => 'mdi:gmail',
            'description' => 'Untuk kerjasama atau pertanyaan detail',
            'cta' => 'Kirim Email',
            'url' => 'mailto:hello@redshop.dev',
            'color' => 'blue',
        ],
    ];
};
