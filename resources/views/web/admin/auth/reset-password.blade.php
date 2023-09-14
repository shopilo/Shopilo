<x-guest-layout :admin="true" :title="__('Reset Password')">
    <div>
        <h5 class="text-primary">{{ __('Reset Password') }}</h5>
        <p class="text-muted">{{ __('Sign in to continue to :app', ['app' => config('app.name')]) }}</p>
    </div>
    <div class="mt-4">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('admin.password.store') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="{{ __('Enter email') }}" value="{{ old('email') }}" />
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password-input">{{ __('Password') }}</label>
                <div class="position-relative auth-pass-inputgroup mb-3">
                    <input type="password"
                        class="form-control @error('password') is-invalid @enderror pe-5 password-input" name="password"
                        id="password-input" placeholder="{{ __('Enter password') }}" />
                    <button
                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                        type="button" id="password-addon">
                        <i class="ri-eye-fill align-middle"></i>
                    </button>
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="confirm-password-input">{{ __('Confirm Password') }}</label>
                <input type="password"
                    class="form-control @error('password_confirmation') is-invalid @enderror pe-5 confirm-password-input"
                    name="password_confirmation" id="confirm-password-input"
                    placeholder="{{ __('Confirm password') }}" />
                @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mt-4">
                <button class="btn btn-primary w-100" type="submit">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>