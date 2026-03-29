<?php

namespace App\Filament\Resources\Homes\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class HomeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('h1')
                    ->required(),
                Textarea::make('description')
                    ->required(),
            ]);
    }
}
