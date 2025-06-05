<x-app-layout>
    @include('layouts.sidebar')

    {{-- 
        PENTING: Pastikan file `layouts.sidebar.blade.php` Anda juga responsif.
        Misalnya, sidebar itu sendiri harus memiliki kelas seperti `hidden md:block`
        untuk menyembunyikannya di mobile dan menampilkannya di md ke atas.
        Jika sidebar Anda muncul di mobile, maka `ml-64` di main akan mendorong konten terlalu jauh.
    --}}

    {{-- Main content - tambahkan kelas responsif untuk margin kiri --}}
    <main class="md:ml-64">
        {{-- Jika Anda ingin header ini aktif, uncomment bagian x-slot header di app.blade.php Anda --}}
        {{-- <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-center text-purple-800 drop-shadow">
                {{ __('Edit Profil') }}
            </h2>
        </x-slot> --}}

        <div class="min-h-screen py-8 bg-gradient-to-b from-purple-100 to-white">
            {{-- Kontainer utama untuk formulir profil --}}
            {{-- mx-auto dan px-4 (mobile) akan otomatis responsif dengan breakpoint sm: dan lg: --}}
            <div class="max-w-xs px-4 mx-auto space-y-8 sm:max-w-xl sm:px-6 lg:max-w-3xl lg:px-8">
                
                {{-- Update Profile Information Form --}}
                <div class="p-6 transition-all duration-300 bg-white shadow-xl rounded-2xl ring-2 ring-purple-100 hover:scale-105 hover:shadow-2xl hover:ring-fuchsia-300">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                {{-- Update Password Form --}}
                <div class="p-6 transition-all duration-300 bg-white shadow-xl rounded-2xl ring-2 ring-purple-100 hover:scale-105 hover:shadow-2xl hover:ring-fuchsia-300">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                {{-- Delete User Form --}}
                <div class="p-6 transition-all duration-300 bg-white shadow-xl rounded-2xl ring-2 ring-purple-100 hover:scale-105 hover:shadow-2xl hover:ring-fuchsia-300">
                    <div class="max-w-xl mx-auto">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>