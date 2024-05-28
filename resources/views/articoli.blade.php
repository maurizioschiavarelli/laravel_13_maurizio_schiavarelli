<x-html>

    <h1 class="titolo_index">Benvenuto nella pagina articoli</h1>

    {{-- <!-- foreach che mostra tutti gli articoli in modo dinamico -->

    <!-- @foreach ($articles as $article )

    <li>...{$article}...</li>

    @endforeach -->

    <!-- foreach per array associativo -->

    <!-- @foreach ($articles as $article )

    <li class="list_articles">{{$article['title']}} - {{$article['body']}}</li>

    @endforeach -->

    <!-- mettere tutto in una card di bootstrap --> --}}

<div class="container">
    <div class="row">
        {{-- {{$articles->links()}} --}}
    @foreach ($articles as $article )

    <div class="col-3">
    <div class="card" style="width: 18rem;">
        @if($article->cover)
        <img src="{{Storage::url($article->cover)}}" alt="">
        @else
        <img src="https://picsum.photos/200/300" alt="">
        @endif
        <div class="card-body d-flex flex-column align-items-center">
            <h5 class="card-title">{{$article['title']}}</h5>
            @empty($article->author)
            <p>{{'autore non presente'}}</p>
            @else
            <a href="{{route('article.byAuthor',$article->author)}}">{{$article->author->name ?? 'anonimo'}} {{$article->author->surname ?? 'anonimo'}}</a>
            @endempty
            <p class="card-text">{{Str::limit($article->body ?? 'testo non presente', 50)}}</p>
            <!-- nome rotta ->poi per dare il parametro id associato a article id -->
            <a href="{{route('articolo',['id'=>$article['id']])}}" class="btn btn-primary">APRI DETTAGLI</a>
        </div>
    </div>
    </div>

    @endforeach

    {{-- {{$articles->links()}} --}}

    </div>
</div>



</x-html>
