<x-html>

    <h1 class="text-center mt-4">CREA LA CATEGORIA</h1>

    @if (session()->has('success'))
        <div class=" alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">NOME CATEGORIA</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}">

            @error('title')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <div class="form-floating">
            <textarea class="form-control" style="height: 100px" name="description" value="{{ old('description') }}"></textarea>
            <label>DESCRIZIONE</label>

            @error('description')
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">CREA NUOVA CATEGORIA</button>
    </form>

</x-html>
