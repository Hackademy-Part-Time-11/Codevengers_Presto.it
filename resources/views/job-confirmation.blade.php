<x-layout-main>

    <div class="text-light">
        <h2>Grazie per la tua richiesta, {{ $nome }}!</h2>
        <p>Abbiamo ricevuto la tua richiesta per diventare revisore. Verificheremo le tue informazioni e ti contatteremo al più presto.</p>
        
        <p>Dettagli della richiesta:</p>
        <ul>
            <li><strong>Nome:</strong> {{ $nome }}</li>
            <li><strong>Email:</strong> {{ $email }}</li>
        </ul>
    
        <p>Riceverai una conferma via email non appena il processo di revisione sarà completato.</p>
    </div>

</x-layout-main>
