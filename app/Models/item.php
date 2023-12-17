<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

use function PHPUnit\Framework\isEmpty;

class item extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['title', 'price', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccept($value)
    {

        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {

        return Item::where('is_accepted', null)->count();
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function item_images()
    {
        return $this->hasMany(Item_image::class);
    }

    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->description,
        ];
        return $array;
    }
    public static function filter($search, $categorie, $order)
    {

        if (!empty($search)) {
            $query = Item::search($search)->where('is_accepted', true);
        } else {
            $query = Item::query()->where('is_accepted', true);
        }

        if (!empty($categorie)) {
            $query->whereHas('categories', function ($a) use ($categorie) {
                $a->whereIn('name', $categorie);
            });
        }

        switch ($order) {
            case 'Z-a':
                $query->orderByDesc('title');
                break;

            case 'T':
                $query->orderByDesc('updated_at');
                break;

            case 't':
                $query->orderBy('updated_at');
                break;

            case 'M-m':
                $query->orderBy('price');
                break;

            case 'm-M':
                $query->orderByDesc('price');
                break;

            default:
                $query->orderBy('title');
                break;
        }


        return $query->paginate(10);
    }
}
