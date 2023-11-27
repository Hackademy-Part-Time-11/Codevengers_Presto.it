<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RispostaLavoraConNoi;

class LavoraConNoiController extends Controller
{
    public function index()
    {
        return view('job');
    }

    public function submit(Request $request)
    {
        $nome = $request->input('nome');
        $email = $request->input('email');
        $richiesta = $request->input('richiesta');

        Mail::to('indirizzo_email_destinatario@example.com')->send(new RispostaLavoraConNoi($nome, $email, $richiesta));

        return view('conferma_lavoro')->with(['nome' => $nome, 'email' => $email]);
    }
}
