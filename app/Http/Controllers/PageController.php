<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreArticleRequest;

class PageController extends Controller
{
// questo ora non verra piu utilizzato , i dati degli articoli li prenderemo dal db
    // public $articles = [
    //     1=>['id'=> 1, 'title' => 'Articolo1', 'body' => 'lorem ipsum'],
    //     2=>['id'=> 2, 'title' => 'Articolo2', 'body' => 'lorem ipsum'],
    //     3=>['id'=> 3, 'title' => 'Articolo3', 'body' => 'lorem ipsum'],
    //     4=>['id'=> 4, 'title' => 'Articolo4', 'body' => 'lorem ipsum'],
    // ];

    public function index(){

        $name = 'Maurizio';
        $surname = 'Schiavarelli';
        $is_logged = true;

        return view('index',compact('name','surname','is_logged'));
    }

    public function articoli(){

        //ARRAY CONTENTE GLI ARTICOLI CHE VERRANNO MOSTRATI NELLA VISTA
        //nella vista useremo il foreach per mostrare tutti gli articoli

        // $articles = [
        //     'articolo1',
        //     'articolo2',
        //     'articolo3',
        // ];

        //array contenente un array di array associacivo


            //$articles = Article::all();
            $articles = Article::orderBy('created_at','DESC')->paginate(15);

            return view('articoli',compact('articles'));

    }

    public function articolo($id){

       //funhzione array_key_exist che da true se la chiave che passi esiste , questo serve per evitare che un utente inserisca id nell uri che non esistono

        // if(array_key_exists($id,$this->articles)){
        //     $article = $this->articles[$id];
        //     return view('articolo', compact('article'));
        // }else{
        //      abort(404);
        // }

        //select * from articles where id = $id
        //$article = Article::where('id',$id)->first();
        $article = Article::findOrFail($id);
        return view('articolo', compact('article'));
    }

    public function chiSiamo(){

        $auth = [
            'username'=> 'Maurizio',
            'email'=> 'maurizio@gmail.com',
        ];

        return view('chi-siamo',compact('auth'));
    }

    public function seeder(){

        $articles = [
            1=>['id'=> 1, 'title' => 'Articolo1', 'body' => 'lorem ipsum'],
            2=>['id'=> 2, 'title' => 'Articolo2', 'body' => 'lorem ipsum'],
            3=>['id'=> 3, 'title' => 'Articolo3', 'body' => 'lorem ipsum'],
            4=>['id'=> 4, 'title' => 'Articolo4', 'body' => 'lorem ipsum'],
        ];



        //dobbiamo spostare questi dati nella tabella , se ne occupera il model article
        //per creare un record nella riga:

        //modello che si interfaccia con la tabella
        //nella classe del modello dovremo indicare le colonne fillabili
        \App\Models\Article::create([
            'id'=>1,
            'title'=> '	articolo 1',
            'body'=> 'lorem ipsum',
        ]);

        \App\Models\Article::create([
            'id'=>2,
            'title'=> '	articolo 2',
            'body'=> 'lorem ipsum',
        ]);

        \App\Models\Article::create([
            'id'=>3,
            'title'=> '	articolo 3',
            'body'=> 'lorem ipsum',
        ]);


            return view('seeder');
    }

    public function create(){
       return view('createArticles') ;
    }

    public function store(StoreArticleRequest $request){
        //nella richiesta ora ho i dati
        //dd($request->all()) ;
        //per creare un articolo da salvare nel db

        //qui verranno effettuati i controlli per evitarte che l utente inserisca correttamente i dati
        // $validator = Validator::make(
        //     $request->all(),
        //     //regole che ogni input deve rispettare
        //     [
        //         'title'=> 'required|max:50', //controlla input title
        //         'body'=>'required',
        //     ],
        //     //messaggi di errore
        //     [
        //         'title.requred'=>'il titolo é obbligatorio',
        //         'title.max'=>'il titolo é troppo lungo',

        //         'body.required'=>'il body é obbligatorio',
        //     ]
        // );

        // // controllare i campi

        // if($validator->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // } ;
        //dd($request->all());

        //salviamo la cover


        $article = Article::create([
            'title'=>$request->title,
            'body'=>$request->body,
            //'cover'=>$path,
        ]);


        if($request->hasFile('cover')){
            //salvo img
          $article->cover = $request->file('cover')->storeAs('public/covers/'.$article->id,'cover.jpg');
          $article->save();
            //dd($path);
        }





        return redirect()->back()->with(['success'=>'articolo inserito']);
     }

     public function dashboard(){
        return view('dashboard');
     }


}




//per non richiamare gli articoli 2 volte nella vista articoli e articolo possiamo passarli come proprieta della classe e poi richiamre this->$articles
