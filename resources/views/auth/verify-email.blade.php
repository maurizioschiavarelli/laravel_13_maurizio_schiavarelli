<x-html>

    <h1 class="text-center mt-4">INVIA MAIL DI CONFERMA</h1>

    @if (session('status') == 'verification-link-sent')
    <div class="mb-4 font-medium text-sm text-green-600">
        A new email verification link has been emailed to you!
    </div>
    @endif

    <form method="POST" action="/email/verification-notification">
        @csrf

    <button type="submit" class="btn btn-primary">invia mail</button>

    </form>

</x-html>
