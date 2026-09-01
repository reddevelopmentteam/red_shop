<?php

use Livewire\Component;

new class extends Component
{
    public string $nama = '';

    public string $email = '';

    public string $jenisPertanyaan = '';

    public string $namaTemplate = '';

    public string $pesan = '';

    public array $questionTypes = [
        'Pertanyaan umum',
        'Kendala teknis',
        'Kerjasama',
        'Lainnya',
    ];

    public function kirimPesan(): void
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenisPertanyaan' => 'required',
            'pesan' => 'required|string|min:10',
        ]);

        session()->flash('success', 'Pesan berhasil dikirim! Terima kasih sudah menghubungi kami.');

        $this->reset(['nama', 'email', 'jenisPertanyaan', 'namaTemplate', 'pesan']);
    }
};
