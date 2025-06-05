<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar GajianKuy</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            /* Background gelap dengan gradien ungu-fuchsia yang dalam (STATIS) */
            background: linear-gradient(to bottom right, #a855f7, #d946ef); /* deep purple shades */
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden; /* Mencegah scroll horizontal dari animasi lain/konten */
        }
        /* Gradient untuk logo - cerah di atas gelap */
        .text-gradient-logo {
            background: linear-gradient(to right, #a855f7, #d946ef); /* purple-500 to fuchsia-500 */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* Gradient untuk tombol utama - cerah dan menonjol */
        .btn-gradient {
            background: linear-gradient(to right, #a855f7, #d946ef); /* purple-500 to fuchsia-500 */
        }
        .btn-gradient:hover {
            background: linear-gradient(to right, #9333ea, #c026d3); /* purple-600 to fuchsia-600 */
        }
        /* Animasi fade-in */
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
        <h2 class="mb-6 text-3xl font-bold text-center text-gray-800">Daftar Akun</h2>

        <x-auth-session-status class="mb-4 text-sm text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <div>
                <x-input-label for="name" :value="__('Name')" class="font-semibold text-gray-700" />
                <x-text-input id="name" class="block w-full px-4 py-2 mt-1 transition bg-gray-100 border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" class="font-semibold text-gray-700" />
                <x-text-input id="email" class="block w-full px-4 py-2 mt-1 transition bg-gray-100 border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="password" :value="__('Password')" class="font-semibold text-gray-700" />
                <x-text-input id="password" class="block w-full px-4 py-2 mt-1 transition bg-gray-100 border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="font-semibold text-gray-700" />
                <x-text-input id="password_confirmation" class="block w-full px-4 py-2 mt-1 transition bg-gray-100 border-gray-300 rounded-lg focus:ring-purple-500 focus:border-purple-500" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
            </div>

            <div class="flex flex-col items-center gap-4 mt-4 md:flex-row md:justify-between">
                <a class="text-sm text-purple-700 transition hover:underline hover:text-fuchsia-600" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="w-full px-6 py-2 font-bold text-white transition-all duration-300 shadow-lg md:w-auto rounded-xl btn-gradient hover:scale-105">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

            <div class="mt-6 text-center">
                <p class="text-sm text-gray-700">Sudah punya akun?
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="font-semibold text-purple-700 hover:underline hover:text-fuchsia-600">Login sekarang</a>
                    @endif
                </p>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Kode background animasi dihapus di sini

            // Animasi fade-in untuk register card
            const registerCard = document.querySelector('.animate-fade-in');
            const appearOptions = {
                threshold: 0.1, // Element is 10% visible
                rootMargin: "0px 0px -50px 0px" // Starts animation a bit before fully in view
            };
            const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        appearOnScroll.unobserve(entry.target);
                    }
                });
            }, appearOptions);
            appearOnScroll.observe(registerCard);
        });
    </script>
</body>
</html>