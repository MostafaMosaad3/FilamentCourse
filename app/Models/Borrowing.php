<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Borrowing extends Model
{
    protected $guarded = [];

    public function borrower() : BelongsTo
    {
        return $this->belongsTo(Borrower::class);
    }

    public function book() : BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
