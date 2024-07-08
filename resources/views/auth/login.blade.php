<x-layout>
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card p-4 shadow-sm" style="width: 100%; max-width: 400px;">
            <h3 class="text-center mb-4">Login</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>
</x-layout>
