<?php

namespace App\Filament\Resources\Services\Schemas;

use App\Models\Service;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make()->schema([

                    TextInput::make('name')
                        ->maxLength(255)
                        ->live(true)
                        ->required()
                        ->afterStateUpdated(function (Set $set, Get $get, ?string $state,
                                                      string $operation) {
                            if ($operation === 'edit' && $get('slug')) {
                                return;
                            }
                            $set('slug', Str::slug($state));
                        }),

                    TextInput::make('slug')
                        ->maxLength(255)
                        ->unique(ignoreRecord: true)
                        ->helperText('Генеруеться автоматично з назви')
                        ->required(),

                    Textarea::make('description')
                        ->required()
                        ->autosize()
                        ->columnSpanFull(),

                ])->columnSpan(2),


                Section::make()->schema([


                    Select::make('parent_id')
                    ->options(function (){
                        return self::getServicesTree(Service::all());
                    })
                        ->disableOptionWhen(function (Get $get, string $value){
                            return $value == $get('id');
                        })
                    ->placeholder('Основне направлення'),


                    FileUpload::make('image')
                        ->image()
                        ->disk('public')
                        ->directory('uploads/services')
                        ->visibility('public')
                        ->default(null)
                        ->required(),
                ]),


            ])->columns(3);
    }

    public static function getServicesTree($services, $parentId = null, $depth = 0): array
    {
        $options = [];
        foreach ($services->where('parent_id', $parentId) as $service) {
            $prefix = str_repeat('- ', $depth);
            $options[$service->id] = $prefix . $service->name;
            $children = self::getServicesTree($services, $service->id, $depth + 1);
            $options += $children;
        }
        return $options;
    }
}
