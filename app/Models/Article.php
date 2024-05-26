<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    //nel caso in cui plurale della tabella e singolare del modello non corrispondono :
    //protected $table = 'nome tabella';


    //ogni tabella verra mappata con un model
    //per mettere in relazione database e backend laravel da ad ogni tabella una classe con nome al singolare
    //quindi ogni riga di una tabella corrisponde ad un oggetto di quel modello
    //quindi le proprieta del model article saranno title, id, body ,create_at, update_at
    //per creare un record creeremo una pagina (rotta) seeder

    //dovremo creare le colonne fillabili

    protected $fillable = ['title','body','cover']; //id non sara una colonna riempibile perche viene creato in utomatico e non potra essere modificato
}
