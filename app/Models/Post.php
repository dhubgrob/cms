<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title', 'description', 'content', 'image', 'published_at', 'category_id'
    ];

    /**
     * 
     * Delete post image from storage
     * 
     * @return void
     */

    public function deleteImage() {
        Storage::delete($this->image);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
