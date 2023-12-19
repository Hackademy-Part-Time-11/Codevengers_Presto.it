<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Administrator extends Component
{
    public $valoreSelezionato;

    // Altri metodi e variabili...

    public function render()
    {

        $admins = User::where('is_admin', true)->get();
        $revisioners = User::where('is_revisor', true)->where('is_admin', null)->get();
        $users = User::where('is_revisor', null)->where('is_admin', null)->get();
        $livels=['SuperUser','Revisioner','User'];
        return view('livewire.nome-componente', compact(
            'admins',
            'revisioners',
            'users',
            'livels',
        ));
    }

    public function update($revisionerId,$type)
    {
        $revisioner = Revisioner::find($revisionerId);
        $revisioner->ruolo = $this->valoreSelezionatoRevisioner;
        $revisioner->save();
    }

}
