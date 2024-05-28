<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

//use si usa per richiamare if file controller che contiene la logica del sito
use App\Http\Controllers\PageController;



/*

// 1) come creare una route senza utilizzare i controller
//get ( chiede la risorsa / che sara la homepage e ritorna la vista 'welcome'(ovvero la pagina chiamata 'welcome' in resources/view))

Route::get('/', function () {
    return view('welcome');
});

step per creare una nuova pagina :
    -creare una rotta
    -creare una nuova vista

Route::get('url pagina' , function(){
    //action
})

*/



/*

2) come passare una variabile ad una rotta
    - creare una variabile all'interno della funzione anonima
    - come parametro di view possiamo passare un array associativo,al cui interno ora passeremo i nostri dati
    - nel file html {{$name}}

Route::get('/' ,function(){

    $name = 'maurizio'
    return view('index',
    [
        'name'=> $name,
    ]);
});






*/


/*

3)

//route della homepage che richiama la rotta /
Route::get('/' ,function(){

    $name = 'maurizio';
    $surname = 'schiavarelli';

    return view('index',
    [
        'name'=> $name,
        'surname'=> $surname,

        //variabile is_logged che se true mostra name e surname nell html
        'is_logged' => false,
    ]);
});

*/

/*
4)
coelescing operator alla vista prova coelescing operator (funzione che permette di lavorare con una rotta con variabili assenti nell html)


*/



//questa é una route prova per il coelescing operator dove nell'html passiamo una variabile che nella logica non c'é
Route::get('/coelescing' ,function(){

    $name = 'Maurizio';
    $is_logged = true;

    return view('provaCoelescingOperator',compact('name','is_logged'));
});











//ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE ROTTE

//passare alla vista un array contenente i dati utente
Route::get('chi-siamo',[PageController::class, 'chiSiamo'] )->name('chi-siamo');

//passare delle variabili alla vista con la funzione compact (funzione di php che unisce chiave e valore in un array)
//il metodo get accetta come parametri una stringa (uri) e un array che contiene nome del controller e metodo del controller che vogliamo richiamre
Route::get('/' ,[PageController::class,'index'])->name('index');

//pagina che mostra gli articoli
Route::get('/articoli', [PageController::class,'articoli'])->name('articoli');

//ROTTE PARAMETRICHE
//pagina articolo che mostra i dettagli del singolo articolo della pagina/articoli
//devo passare l'informazione che mi permette di raggiungere la pagina corretta e relativa all'articolo, per farlo useremo l'id
/*passeremo l id attraverso la rotta usando il metodo get seguendo 3 passaggi:
    -predisporre nell url uno spazio che conterra l'id (dicitura url {id})
    -aggiornae la funzione per ricevere il parametro in input spostando (per farlo la funzione deve ricevere come parametro $id)
    -aggiornare il pulsante nella vista affinche mostri la pagina dell articolo scelto
*/

Route::get('/articolo/{id}',[PageController::class, 'articolo'] )->name('articolo');




//rotta la cui funzione e quindi logica e'all interno della classe controller
//quando viene usata la rotta /test deve incvocare la funzione del controller
//usare use e il namespace seguito dal nome del controller per evitare di richiamarlo nella route
//ora tutta la logica delle rotte la sposteremo nel PageController


//5) creazione route di contatto per il form invio mail
//        -creare la rotta
//        - creare un nuovo controller ContactController
//        - creare la funzione nel relativo controller
//        - mostrare la vista all utente

Route::get('/contatti',[ContactController::class,'showPage'])->name('contatti');

//        -creare il form
//        -creare la rotta (post) che gestira la richiesta del form (che riceve input e invia il contatto)


Route::Post('/salva-contatto',[ContactController::class,'save'])->name('contatti.salva');

Route::get('/grazie',[ContactController::class,'grazie'])->name('grazie');


//questa é la rotta che ci permettera di popolare le tabelle
Route::get('/seeder',[PageController::class,'seeder'])->name('seeder');

//form per aggiunta articolo
Route::get('createArticle',[PageController::class,'create'])->middleware(['auth', 'verified'])->name('create');
Route::post('articleStore',[PageController::class,'store'])->middleware(['auth', 'verified'])->name('store');

Route::get('/dashboard',[PageController::class, 'dashboard'])->name('dashboard');

Route::resource('categories',CategoryController::class);

Route::get('/article-by-author/{author}',[PageController::class,'articleByAuthor'])->name('article.byAuthor');
