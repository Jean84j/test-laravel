<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->default('Пусто')
                    ->label('Название')
                    ->hint('for Title')
                    ->required(),
                TextInput::make('slug')
                    ->disabledOn('edit')
                    ->required(),

                TextInput::make('email')->email(),
                TextInput::make('domain')->prefix('https://')->suffix('.com'),
                TextInput::make('password')->password()->revealable(),
                TextInput::make('tel')->placeholder('xxx xxx xx')->mask('999-999-99-99'),

                Select::make('status')->options([
                    '342342', '56756456', '789789789'
                ])->native(false)->searchable()->multiple(),

                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),


                FileUpload::make('image')
                    ->image()->imageEditor()->multiple(),


            ])->columns(3);
    }
}
