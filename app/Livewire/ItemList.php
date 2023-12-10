<?php  
namespace App\Livewire;

use App\Models\item;
use App\Models\category;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
class ItemList extends Component
{
    use WithPagination;
    #[Url]
    public $search = '';

    public $categorie = [];
    public $order = 'A-z';


    public function render()
    {

        $items = item::filter($this->search, $this->categorie, $this->order);


        $categories = category::all();
        return view('livewire.itemList', compact("items", "categories"));
    }
}
