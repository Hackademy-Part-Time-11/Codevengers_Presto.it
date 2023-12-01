<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\isEmpty;

class item extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price', 'description', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value) {

        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public function toBeRevisionedCount() {

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


    public static function search($search, $categorie, $order)
    {

        $query = Item::query();

        if (!empty($search)) {
            $query->where('title', 'LIKE', "%$search%");
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
                $query->orderBy('updated_at');
                break;

            case 't':
                $query->orderByDesc('updated_at');
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



        return $query->get();
        // paginate(10);

        }
}
