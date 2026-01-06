<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('isbn')
                    ->required(),
                TextInput::make('total_copies')
                    ->required()
                    ->numeric(),
                TextInput::make('available_copies')
                    ->required()
                    ->numeric(),
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->required(),
            ]);
    }
}
