<?php

namespace App\Filament\Resources\Borrowings\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class BorrowingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('borrower_id')
                    ->relationship('borrower', 'name')
                    ->required(),
                Select::make('book_id')
                    ->relationship('book', 'title')
                    ->required(),
                DateTimePicker::make('borrowed_at'),
                Select::make('status')
                    ->options(['borrowed' => 'Borrowed', 'returned' => 'Returned'])
                    ->default('borrowed')
                    ->required(),
            ]);
    }
}
