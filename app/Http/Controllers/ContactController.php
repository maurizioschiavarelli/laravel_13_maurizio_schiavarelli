<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function showPage(){
        return view("contatti");
    }

    // i dati inviati sono passati dalla richiesta , quindi per prendere la richiesta e quindi i dati : tra i parametri della funzione save deve esserci (Request $request)
    public function save(Request $request){
        //dd($request->all());
        //dd($request->input("name"));
        //dd($request->name);

        // QUESTO COSTRUTTO CI PERMETTE DI IMPEDIRE DI LASCIARE CAMPI VUOTI ALL INVIO DELLA RICHIESTA DA PARTE DELL UTENTE

        if($request->name==null || $request->email==null || $request->message==null){
           //return 'errore' ;
           return redirect()->back()->with(["error"=>"Compila tutti i campi"]); //flash message
           //per visualizzare il messaggio di errore nel file html (nel form)...
        }

        /*
        invio mail
            -per prima cosa andremo a creare una nuova mail con il comando  php artisan make:mail ContactMail
            - creiamo la vista della mail
        */      

        $mail = new ContactMail($request->name, $request->email, $request->message); //request->name perche questi dati sono nella richiesta
        Mail::to($request->email)->send($mail);

        //serve per visualizzare la mail nel browser 
        //return $mail->render();
        
        //dopo il click dell invio dati l utente verra reindirizzato ad una pagina di ringraziamento
        //quindi dopo il click gli restituiremo la vista della pagina di ringraziamento

        //return view("graziePage");
        //IL RETURN VIEW NON VA BENE XCHE LA FUNZIONE DEVE USCIRE DALLA RICHIESTA USEREMO IL REDIRECT
        return redirect(route("grazie"));
    }

    public function grazie(){
        return view("grazie");
    }
}
