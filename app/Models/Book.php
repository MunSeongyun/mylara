<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Author;
use App\Models\BookDetail;
use App\Models\Tag;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'author_id',
        'publisher_id',
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => mb_convert_case($value, MB_CASE_TITLE, "UTF-8"),
            set: fn (string $value) => mb_convert_case($value, MB_CASE_UPPER, "UTF-8")
        );
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function detail()
    {
        return $this->hasOne(BookDetail::class, 'book_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // protected $guarded = [
    //     'id',
    //     'created_at',
    //     'updated_at'
    // ];
}
