<?php

namespace App\Filament\Resources\Brands\Schemas;

use App\Models\Brand;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BrandForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->debounce(2000)
                    ->afterStateUpdated(fn($state , $set) => $set('slug' , Str::slug($state))),
                TextInput::make('slug')
                    ->maxLength(255)
                    ->required()
                    ->disabled()
                    ->dehydrated()
                    ->unique(Brand::class , 'slug' , ignoreRecord:true),
                FileUpload::make('image')
                    ->image()
                    ->directory('brands')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
