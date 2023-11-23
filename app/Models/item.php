<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'description','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function item_image()
    {
        return $this->hasMany(Item_image::class);
    }
}
