<x-app-layout>

    {{-- Memanggil sidebar yang sudah responsif.
         Sidebar ini akan berubah menjadi navigasi bawah di layar mobile. --}}
    @include('layouts.sidebar')

    {{-- Konten utama halaman dashboard.
         - md:ml-64: Memberi margin kiri 64 unit (lebar sidebar) di layar desktop/tablet.
         - pb-20: Memberi padding bawah 20 unit di layar mobile (untuk navigasi bawah).
         - md:pb-0: Menghilangkan padding bawah di layar desktop/tablet.
         - px-4 sm:px-6 lg:px-8: Memberi padding horizontal responsif sebagai "margin" dari tepi layar.
         - max-w-7xl mx-auto: Membatasi lebar konten dan memusatkannya di layar besar. --}}
    <main class="px-4 pb-20 mx-auto md:ml-64 md:pb-0 sm:px-6 lg:px-8 max-w-7xl">
        {{-- Div untuk teks sambutan --}}
        <div class="mt-12 mb-8 text-center"> {{-- Hapus kelas px-* dari sini --}}
            <p class="text-3xl font-extrabold text-purple-800 drop-shadow">
                Halo, <span class="text-fuchsia-600 animate-pulse">{{ Auth::user()->name }}</span> 🙋‍♂️
            </p>
            <p class="mt-2 text-lg font-medium text-gray-600">
                Selamat datang di website <span class="font-semibold text-purple-700">PT Dompet Anak Jawa Digital</span>.
            </p>
        </div>

        {{-- Div untuk kartu dashboard utama.
             Kelas 'mx-auto' akan memusatkan div ini di dalam main. --}}
        <div class="max-w-2xl p-8 mx-auto transition-all duration-300 bg-white shadow-xl rounded-2xl ring-2 ring-purple-100 hover:scale-105 hover:shadow-2xl hover:ring-fuchsia-300"> {{-- Hapus kelas px-* dari sini --}}
            <h2 class="mb-4 text-2xl font-bold text-center text-purple-800 drop-shadow">Dashboard</h2>
            @if(auth()->user()->hasRole('admin'))
            <p class="mb-6 text-center text-gray-600">Anda dapat mengelola data gaji & pengajuan karyawan di sini.</p>
            @endif
            @if(auth()->user()->hasRole('user'))
            <p class="mb-6 text-center text-gray-600">Anda dapat melihat daftar gaji dan pengajuan Anda di sini.</p>
            @endif
            <div class="flex flex-col items-center gap-4 md:flex-row md:justify-center">
                <a href="{{ route('gaji.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 font-bold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-purple-500 to-fuchsia-500 rounded-xl hover:scale-110 hover:from-fuchsia-600 hover:to-purple-600 focus:outline-none focus:ring-4 focus:ring-fuchsia-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6" />
                    </svg>
                    @if(auth()->user()->hasRole('admin'))
                        Lihat Daftar Gaji Karyawan
                    @endif
                    @if(auth()->user()->hasRole('user'))
                        Lihat Gaji Anda
                    @endif
                </a>
                <a href="{{ route('submissions.index') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 font-bold text-white transition-all duration-300 shadow-lg bg-gradient-to-r from-fuchsia-500 to-purple-500 rounded-xl hover:scale-110 hover:from-purple-600 hover:to-fuchsia-600 focus:outline-none focus:ring-4 focus:ring-purple-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    @if(auth()->user()->hasRole('admin'))
                        Lihat Daftar Pengajuan Karyawan
                    @endif
                    @if(auth()->user()->hasRole('user'))
                        Lihat Pengajuan Anda
                    @endif
                </a>
            </div>
        </div>
    </main>
</x-app-layout>
