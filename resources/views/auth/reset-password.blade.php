
<x-html>

    <h1 class="text-center mt-4">RESET DELLA PASSWORD</h1>

    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="/reset-password">
        @csrf

        <input type="hidden" name="token" value="{{request()->route('token')}}">

        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}">

            @error('email')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">

            @error('password')
                <span>{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" name="password_confirmation">

    </div>



        <button type="submit" class="btn btn-primary">reset password</button>


    </form>

</x-html>
