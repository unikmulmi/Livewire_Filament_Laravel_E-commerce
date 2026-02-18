<?php

namespace App\Filament\Resources\Categories\Schemas;

use App\Models\Category;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class CategoryForm
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
                    ->unique(Category::class , 'slug' , ignoreRecord:true)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('categories'),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
