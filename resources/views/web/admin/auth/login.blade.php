<x-guest-layout :admin="true" :title="__('Login')">
    <div>
        <h5 class="text-primary">{{ __('Welcome Back') }}</h5>
        <p class="text-muted">{{ __('Sign in to continue to :app', ['app' => config('app.name')]) }}</p>
    </div>
    <div class="mt-4">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                    placeholder="{{ __('Enter email') }}" value="{{ old('email') }}" />
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                @if (Route::has('admin.password.request'))
                <div class="float-end">
                    <a href="{{ route('admin.password.request') }}" class="text-muted">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
                @endif
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
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="auth-remember-check" name="remember">
                <label class="form-check-label" for="auth-remember-check">
                    {{ __('Remember me') }}
                </label>
            </div>
            <div class="mt-4">
                <button class="btn btn-primary w-100" type="submit">
                    {{ __('Login') }}
                </button>
            </div>
            <div class="mt-4 text-center">
                <div class="signin-other-title">
                    <h5 class="fs-13 mb-4 title">{{ __('Or Sign in with') }}</h5>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light">
                        <i class="ri-facebook-fill fs-16"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light">
                        <i class="ri-google-fill fs-16"></i>
                    </button>
                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light">
                        <i class="ri-github-fill fs-16"></i>
                    </button>
                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light">
                        <i class="ri-twitter-fill fs-16"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-guest-layout>