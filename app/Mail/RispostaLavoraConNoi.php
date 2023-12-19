<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RispostaLavoraConNoi extends Mailable
{
    use Queueable, SerializesModels;

    public $nome;
    public $email;
    public $richiesta;

    public function __construct($nome, $email, $richiesta)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->richiesta = $richiesta;
    }

    public function build()
    {
        return $this->view('emails.risposta_lavora_con_noi');
    }
}