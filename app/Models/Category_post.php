<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_post extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'post_id',
    ];
    public $timestamps = false;
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
