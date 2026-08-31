<?php

use Livewire\Component;

new class extends Component
{
    /** @var array<int, array{question: string, answer: string}> */
    public array $faqs = [
        [
            'question' => 'Apakah template bisa langsung digunakan?',
            'answer' => 'Ya, semua template kami dirancang untuk langsung digunakan. Setelah pembelian, Anda akan menerima file lengkap yang siap di-deploy beserta dokumentasi pemasangannya.',
        ],
        [
            'question' => 'Bagaimana cara mendapatkan template?',
            'answer' => 'Pilih template yang diinginkan, lakukan pembayaran, dan file template akan otomatis tersedia untuk diunduh dari akun Anda. Prosesnya cepat dan aman.',
        ],
        [
            'question' => 'Apakah template bisa diubah sesuai kebutuhan?',
            'answer' => 'Ya, semua template kami dibangun dengan struktur yang rapi dan mudah dikustomasi. Anda dapat mengubah warna, teks, gambar, dan komponen lainnya sesuai kebutuhan.',
        ],
        [
            'question' => 'Apakah ada bantuan jika mengalami kendala?',
            'answer' => 'Tentu. Kami menyediakan dukungan teknis untuk setiap pembelian template. Hubungi kami melalui halaman Kontak dan tim kami akan membantu Anda.',
        ],
        [
            'question' => 'Apa itu lisensi digital?',
            'answer' => 'Lisensi digital adalah hak penggunaan template yang Anda beli. Setiap lisensi berlaku untuk satu proyek dan tidak dapat dipindahtangankan ke pihak lain.',
        ],
        [
            'question' => 'Apakah template boleh dijual kembali?',
            'answer' => 'Tidak. Template yang Anda beli tidak boleh dijual kembali atau didistribusikan ulang. Lisensi hanya berlaku untuk penggunaan pribadi atau dalam proyek klien Anda.',
        ],
    ];
};
