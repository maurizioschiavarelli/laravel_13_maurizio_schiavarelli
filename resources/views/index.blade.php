<x-html>

    <!-- if else che permette di mostrare alla vista un testo diferso in base alla variabile is_logged che se true mostra il nome utente -->
    @if ($is_logged==true)
        <h1 class="titolo_index">Homepage</h1>
    @else
        <h1>Effettua l'accesso</h1>
    @endif

</x-html>
