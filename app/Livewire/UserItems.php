<?php
// app/Http/Livewire/UserItems.php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class UserItems extends Component
{
    public function render()
    {
        $user = Auth::user();
        $items = Item::where('user_id', $user->id)->orderBy('is_accepted')->orderByDesc('updated_at')->paginate(10);

        return view('livewire.user-items', ['items' => $items]);
    }
}
