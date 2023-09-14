<x-guest-layout :admin="true" :title="__('Login')">
    <div>
        <h5 class="text-primary">{{ __('Welcome Back') }}</h5>
        <p class="text-muted">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the
            link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </p>
    </div>
    <div class="mt-4">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('admin.verification.send') }}">
            @csrf
            @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success" role="alert">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
            @endif
            <div class="mt-4">
                <button class="btn btn-primary w-100" type="submit">
                    {{ __('Resend Verification Email') }}
                </button>
            </div>
        </form>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <div class="mt-4">
                <button class="btn btn-outline-primary w-100" type="submit">
                    {{ __('Logout') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>