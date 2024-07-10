<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="text-center">
            <form action="{{ route('login.index') }}" method="GET" class="mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </form>
            <form action="{{ route('guide.login.index') }}" method="GET" class="mb-3">
                <button type="submit" class="btn btn-primary btn-lg">Guide Login</button>
            </form>
            <form action="{{ route('register.index') }}" method="GET">
                <button type="submit" class="btn btn-secondary btn-lg">Register</button>
            </form>
        </div>
    </div>
</x-layout>