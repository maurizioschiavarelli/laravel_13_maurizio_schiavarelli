<x-html>

    <h1 class="text-center mt-4">LISTA DELLE CATEGORIE</h1>
    <button><a href="{{route('categories.create')}}">CREA UNA NUOVA CATEGORIA</a></button>

    @if (session()->has('success'))
    <div class=" alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TITOLO</th>
                <th scope="col">AZIONI</th>



            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->title}}</td>

                    <td class="d-flex justify-content-evenly">
                        <a href="{{route('categories.show',$category)}}" class="btn btn-outline-primary">Vedi</a>

                        <a href="{{route('categories.edit',$category)}}" class="btn btn-outline-primary">Modifica</a>

                        <form method="POST" action="{{route('categories.destroy',$category)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

</x-html>
