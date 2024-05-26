<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    //up é la funzione che verra eseguita quando viene creata la tabella
    //per eseguire la funzione up da terminale php artisan migrate
    //con il comando php artisan migrate:rollback laravel andra ad annullare tutte le migrazioni eseguite nell'ultimo comando
    public function up(): void
    {
        //per creare questa tabella tramite riga di comando php artisan make:migration create_articles_table

        Schema::create('articles', function (Blueprint $table) {
            
            $table->id(); //table id é una colonna unsigned big integer con autoincrement

            $table->string('title',50);

            $table->text('body');

            $table->timestamps();//crea due colonne di create e update 

            //dopo aver aggiunto le colonne aggiornare il db con il comando php artisan migrate:refresh o php artisan migrate:fresh (cancella e ricrea l'intero db)
            //per controllare lo stato delle tabelle php artisan migrate:status
        });
    }

    /**
     * Reverse the migrations.
     */

     //per eseguire la funzione di down da terminale 
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

//il model si interfaccia con il database (il nome del modello deve essere al singolare riferito alla tabella). il model ci permette di gestire i dati di una tabella
//per ogni tabella deve esserci un model(escluso chache e jobs e tabelle pivot) con il nome al singolare che si occupera di gestirne i dati
//php artisan make:model Article