<x-html>

    <h1 class="text-center">DASHBOARD</h1>

    {{-- <div class="d-flex justify-content-center">
        <button class=""><a href="{{route('index')}}">TORNA ALL HOME</a></button>
    </div> --}}

    <a href="{{route('categories.create')}}" class="btn btn-primary">CREA CATEGORIA</a>

    <a href="{{route('categories.index')}}" class="btn btn-info"> LISTA CATEGORIE</a>

</x-html>
