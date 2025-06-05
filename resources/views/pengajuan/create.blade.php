<x-app-layout>
    {{-- Hapus @include('layouts.sidebar') jika ini adalah halaman yang berdiri sendiri dan tidak memerlukan sidebar --}}
    {{-- Jika halaman ini memang tidak memerlukan sidebar, pastikan `main` tidak memiliki `ml-64` yang bisa menggeser konten --}}

    {{-- Gunakan flexbox pada body atau container utama untuk menengahkan secara vertikal dan horizontal --}}
    <div class="flex items-center justify-center min-h-screen py-10 bg-gray-100">
        <div class="w-full max-w-lg p-8 bg-white shadow-lg ring-1 ring-purple-100 rounded-xl sm:mx-6 md:mx-8">
            <h2 class="mb-6 text-2xl font-bold text-center text-purple-800 drop-shadow">Buat Pengajuan Baru</h2>
            <form action="{{ route('submissions.store') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="nama" class="block mb-1 font-semibold text-purple-700">Nama:</label>
                    <input type="text" id="nama" name="nama" required
                        value="{{ auth()->user()->name }}"
                        readonly
                        class="w-full px-4 py-2 text-gray-700 transition bg-gray-100 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:outline-none">
                </div>
                <div>
                    <label for="pekerjaan" class="block mb-1 font-semibold text-purple-700">Pekerjaan:</label>
                    <input type="text" id="pekerjaan" name="pekerjaan" required
                        value="{{ auth()->user()->karyawan->pekerjaan ?? 'User Tidak Terhubung' }}"
                        readonly
                        class="w-full px-4 py-2 text-gray-700 transition bg-gray-100 border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:outline-none">
                </div>
                <div>
                    <label for="tanggal_kirim" class="block mb-1 font-semibold text-purple-700">Tanggal Kirim:</label>
                    <input type="date" id="tanggal_kirim" name="tanggal_kirim" required
                        class="w-full px-4 py-2 transition border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:outline-none">
                </div>
                <div>
                    <label for="your_submission" class="block mb-1 font-semibold text-purple-700">Pengajuan Anda:</label>
                    <input type="text" id="your_submission" name="your_submission" required
                        class="w-full px-4 py-2 transition border border-purple-300 rounded-lg focus:ring-2 focus:ring-purple-400 focus:outline-none">
                </div>
                <button type="submit"
                    class="w-full py-2 font-semibold text-white transition-all duration-300 shadow-lg rounded-xl bg-gradient-to-r from-purple-500 to-fuchsia-500 hover:scale-105 hover:from-fuchsia-600 hover:to-purple-600">
                    Submit
                </button>
            </form>
        </div>
    </div>
</x-app-layout>