<?php

namespace App\Filament\Admin\Resources\Contacts\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ContactForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('whatsapp_link'),
                TextInput::make('tiktok_link'),
                TextInput::make('instagram_link'),
                TextInput::make('email_link'),
            ]);
    }
}
