<x-guest-layout :admin="true" :title="__('Confirm Password')">
    <div>
        <h5 class="text-primary">{{ __('Confirm Password') }}</h5>
        <p class="text-muted">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </p>
    </div>
    <div class="mt-4">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('admin.password.confirm') }}">
            @csrf
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
            <div class="mt-4">
                <button class="btn btn-primary w-100" type="submit">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>