<x-html>

<h1>Prova Coelescing Operator</h1>

<!-- operatore che ha un comportamento se la variabile c'é, un altro se la variabile non c'é -->
<h1>Ciao {{$name}}</h1>
<h1>Ciao {{$surname ?? 'Surname inesistente'}}</h1>

<!--per evitare che il tag h3 non venga creato nell html e quindi non lasci spazi vuoti :  -->
<!-- userema la funzione empty che da true se la variabile é vuota o non esiste 
                                   da false se la variabile esiste
spiegazione al 1:05:08 https://hackademy.it/dashboard/c/10/e/141/l/6430/u/2y10lgy5rj6b/n/named-routes-viste-dinamiche-laravel-2                                   
-->

@if (!empty($surname))
    <h1>{{$surname ?? 'Surname non presente'}}</h1>
@endif

<!-- negando la funzione empty il tag h1 non verra creato -->

</x-html>