<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="card mb-3">
        <div class="card-body">
            <div class="pt-4 pb-2">
                <h5 class="card-title text-center pb-0 fs-4">Login</h5>
            </div>

            <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                @csrf

                <div class="col-12">
                    <label for="yourEmail" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Login</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Don't have an account? <a href="{{ route('register') }}">Create an account</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
