<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Book;

class BookDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'book_id';

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
