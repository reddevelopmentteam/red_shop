<?php

use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::catalog')] class extends Component
{
    public function render()
    {
        return view('pages.contact.contact');
    }
};
