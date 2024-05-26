<x-html>

    <h1 class="text-center mt-4">REIMPOSTA PASSWORD</h1>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{route('password.email')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}">

            @error('email')
                <span>{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">recupera password</button>

    </form>

</x-html>
