<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login GajianKuy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* Pastikan styling sesuai dengan yang Anda inginkan untuk halaman login */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom right, #ac54ef, #1a0833);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }
        .text-gradient-logo {
            background: linear-gradient(to right, #a855f7, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .btn-gradient {
            background: linear-gradient(to right, #a855f7, #d946ef);
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #9333ea, #c026d3);
        }
        .animate-fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        .animate-fade-in.is-visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="w-full max-w-md p-4 sm:p-6 md:p-8 mx-6 sm:mx-auto transition-all duration-300 bg-white shadow-2xl rounded-2xl ring-4 ring-purple-200 hover:scale-[1.01] hover:shadow-3xl hover:ring-fuchsia-500 animate-fade-in z-10 relative">
        <div class="mb-8 text-center">
            <a href="/" class="text-4xl font-extrabold text-gradient-logo">GajianKuy</a>
            <p class="mt-2 text-gray-600 text-md">Sistem Penggajian Digital</p>
        </div>
        <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Login Akun</h2> <x-auth-session-status class="mb-4 text-sm text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6"> @csrf

            <div>
                <x-input-label for="email" :value="__('Email')" class="font-semibold text-gray-700" />
                <x-text-input id="email" class="block w-full px-4 py-2 mt-1 transition bg-gray-100 border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="font-semibold text-gray-700" />
                <x-text-input id="password" class="block w-full px-4 py-2 mt-1 transition bg-gray-100 border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-purple-600 border-gray-300 rounded shadow-sm focus:ring-purple-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col items-center gap-4 mt-4 md:flex-row md:justify-between">
                @if (Route::has('password.request'))
                    <a class="text-sm text-purple-700 transition hover:underline hover:text-fuchsia-600" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="w-full px-6 py-2 font-bold text-white transition-all duration-300 shadow-lg md:w-auto rounded-xl btn-gradient hover:scale-105">
                    {{ __('Log in') }} </x-primary-button>
            </div>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-700">Belum punya akun? @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-semibold text-purple-700 hover:underline hover:text-fuchsia-600">Daftar sekarang</a>
                    @endif
                </p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const loginCard = document.querySelector('.animate-fade-in');
            const appearOptions = {
                threshold: 0.1,
                rootMargin: "0px 0px -50px 0px"
            };
            const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        appearOnScroll.unobserve(entry.target);
                    }
                });
            }, appearOptions);
            appearOnScroll.observe(loginCard);
        });
    </script>
</body>
</html>