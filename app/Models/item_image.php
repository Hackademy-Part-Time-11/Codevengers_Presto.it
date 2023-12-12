<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item_image extends Model
{
    use HasFactory;
    protected $fillable = ['item_id','image'];

    protected $casts=['labels'=>'array'];

    public function items()
    {
        return $this->belongsTo(Item::class);
    }

}
