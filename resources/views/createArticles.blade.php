<x-html>
    <!-- CON QUESTO FORM ANDREMO AD AGGIUNGERE UN ARTICOLO NEL DB -->
    <h1>CREA ARTICOLO</h1>

    @if (session()->has('success'))
        <div class=" alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">

        <!-- form input -->
        @csrf



        <div class="mb-3">
            <label class="form-label">TITOLO</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title') }}">
        </div>

        @error('title')
            <span class="small text-danger">{{ $message }}</span>
        @enderror


        <div class="form-floating mt-4">
            <textarea class="form-control  @error('title') is-invalid @enderror" style="height: 100px" name="body">{{ old('body') }}</textarea>
            <label>CONTENUTO</label>


            @error('body')
                <span class="small text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3 mt-4">
            <label for="formFile" class="form-label">Inserisci immagine</label>
            <input class="form-control" type="file" name="cover">

            @error('cover')
                <span class="small text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</x-html>
