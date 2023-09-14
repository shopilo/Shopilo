<x-guest-layout :admin="true" :title="__('Forgot Password')">
    <div>
        <h5 class="text-primary">{{ __('Forgot Password') }}</h5>
        <p class="text-muted">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a
            password reset link that will allow you to choose a new one.') }}
        </p>
    </div>
    <div class="mt-4">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="{{ __('Enter email') }}" value="{{ old('email') }}" />
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <button class="btn btn-primary w-100" type="submit">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>