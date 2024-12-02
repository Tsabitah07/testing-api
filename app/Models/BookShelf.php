<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'description',
        'publish_date',
        'category',
        'quantity',
        'price',
        'is_read'
    ];

    protected $casts = [
        'publish_date' => 'date',
        'is_read' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
