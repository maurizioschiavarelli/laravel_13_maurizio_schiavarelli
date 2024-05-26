<x-html>

    <h3 class="text-center mt-6 fs-1">Compila il form per contattarci</h3>

    <!-- form bootstrap -->
    <!-- quando l'utente clicca sul tasto submit deve avvenire una richiesta post , questo lo scriveremo tramite il method -->
    <!-- la richiesta é formata da due informazioni metodo e uri -->
    <!-- selezionare action -->

    <form method="POST" action="{{route('contatti.salva')}}">
        <!-- ogni form deve avere un token di sicurezza -->
        @csrf

        <!-- messaggio di errore per i campi vuoti -->

        @if (session()->has('error'))
            <div class="text-center alert alert-danger">
            <h3 class="text-center">{{session('error')}}</h3>
            </div>
        @endif

        <!-- form input -->
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome e Cognome</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="form-floating">
            <textarea class="form-control" style="height: 100px" name="message"></textarea>
            <label for="floatingTextarea2">Messaggio</label>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

    <!-- per incapsulare i dati e inviarli ueremo l'attributo name che ci permette di assegnare una chiave e all interno della richiesta verra creata un array chiave valore , dove la chiave é quella da noi scelta e il valore sara il contenuto dell input-->

    <!-- struttura del form :

        array [

        'email'=>email.it,    
        'name'=>mario rossi,
        'message'=> lorem messaggio ipsum,

            ]
    -->
</x-html>