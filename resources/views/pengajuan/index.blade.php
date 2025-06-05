<x-app-layout>

    {{-- Memanggil sidebar yang sudah responsif.
        Sidebar ini akan berubah menjadi navigasi bawah di layar mobile. --}}
    @include('layouts.sidebar')

    {{-- Konten utama halaman pengajuan.
        - md:ml-64: Memberi margin kiri 64 unit (lebar sidebar) di layar desktop/tablet.
        - pb-20: Memberi padding bawah 20 unit di layar mobile (untuk navigasi bawah).
        - md:pb-0: Menghilangkan padding bawah di layar desktop/tablet.
        - px-4 sm:px-6 lg:px-8: Memberi padding horizontal responsif sebagai "margin" dari tepi layar.
        - max-w-7xl mx-auto: Membatasi lebar konten dan memusatkannya di layar besar. --}}
    <main class="px-4 pb-20 mx-auto md:ml-64 md:pb-0 sm:px-6 lg:px-8 max-w-7xl">
        <div class="py-4">
            @if(auth()->check() && auth()->user()->hasRole('user'))
                <div class="mb-6 text-left">
                    <a href="{{ route('submissions.create') }}"
                       class="inline-flex items-center px-5 py-2 font-semibold text-white transition-all duration-300 rounded-lg shadow-lg bg-gradient-to-r from-purple-500 to-fuchsia-500 hover:scale-105 hover:from-fuchsia-600 hover:to-purple-600">
                        + Tambah Pengajuan
                    </a>
                </div>
            @endif

            {{-- Div pembungkus tabel. Tambahkan overflow-hidden di sini. --}}
            <div class="overflow-hidden rounded-2xl ">
                {{-- Hapus border-separate dan border-spacing-0 dari tabel karena TR akan jadi block di mobile --}}
                {{-- Kelas-kelas ini lebih cocok untuk tabel dengan layout tabel tradisional --}}
                <table class="block min-w-full text-sm text-left text-gray-700 md:table">
                    {{-- Tambahkan rounded-t-2xl pada thead untuk membuat sudut atas membulat --}}
                    <thead class="hidden text-xs text-purple-700 uppercase md:table-header-group bg-gradient-to-r from-purple-100 to-fuchsia-100 rounded-t-2xl">
                        <tr>
                            <th class="px-6 py-3">Nama</th>
                            <th class="px-6 py-3">Pekerjaan</th>
                            <th class="px-6 py-3">Tanggal Kirim</th>
                            <th class="px-6 py-3">Isi Pengajuan</th>
                            <th class="px-6 py-3">Status</th>
                            @if(auth()->check() && auth()->user()->hasRole('admin'))
                                <th class="px-6 py-3">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @isset($submissions)
                            @forelse ($submissions as $submission)
                                @if (isset($submission->nama))
                                    {{-- MODIFIKASI UTAMA DI SINI --}}
                                    {{-- Hilangkan 'border-b' untuk mobile. --}}
                                    {{-- Pastikan 'rounded-xl' dan 'shadow' hanya untuk mobile. --}}
                                    {{-- 'mb-4' akan memberikan jarak antar kartu di mobile. --}}
                                    <tr class="transition-all duration-300
                                               odd:bg-white even:bg-purple-50
                                               hover:bg-gradient-to-r hover:from-purple-100 hover:to-fuchsia-100 hover:scale-[1.01]
                                               block md:table-row
                                               mb-4 md:mb-0
                                               rounded-xl shadow md:rounded-none md:shadow-none
                                               md:border-b"> {{-- Border-b hanya di desktop --}}
                                        <td class="px-6 py-4 block md:table-cell before:content-['Nama'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                            {{ $submission->nama }}
                                        </td>
                                        <td class="px-6 py-4 block md:table-cell before:content-['Pekerjaan'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                            {{ $submission->pekerjaan }}
                                        </td>
                                        <td class="px-6 py-4 block md:table-cell before:content-['Tanggal_Kirim'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                            {{ $submission->tanggal_kirim }}
                                        </td>
                                        <td class="px-6 py-4 block md:table-cell before:content-['Isi_Pengajuan'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                            <span class="break-words">{{ $submission->your_submission }}</span>
                                        </td>
                                        <td class="px-6 py-4 block md:table-cell before:content-['Status'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                            @if(auth()->user()->hasRole('admin'))
                                                <form action="{{ route('submissions.updateStatus', $submission->id) }}" method="POST" class="flex flex-wrap items-center gap-2">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="status"
                                                        class="px-3 py-2 pr-10 min-w-[130px] font-semibold text-purple-700 transition-all duration-200 bg-white border border-purple-300 rounded-md shadow-sm focus:ring focus:ring-purple-200">
                                                        <option value="Menunggu" {{ $submission->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                                        <option value="Diterima" {{ $submission->status == 'Diterima' ? 'selected' : '' }}>Diterima</option>
                                                        <option value="Ditolak" {{ $submission->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                    </select>
                                                    <button type="submit"
                                                        class="px-3 py-1 text-white transition-all duration-200 rounded shadow bg-gradient-to-r from-purple-500 to-fuchsia-500 hover:scale-105 hover:from-fuchsia-600 hover:to-purple-600">
                                                        Simpan
                                                    </button>
                                                </form>
                                            @else
                                                <span class="inline-block px-3 py-1 text-xs font-bold rounded shadow
                                                    @if($submission->status == 'Menunggu') bg-purple-400 text-white animate-pulse
                                                    @elseif($submission->status == 'Diterima') bg-gradient-to-r from-blue-500 to-fuchsia-700 text-white
                                                    @elseif($submission->status == 'Ditolak') bg-gradient-to-r from-red-500 to-fuchsia-700 text-white
                                                    @endif">
                                                    {{ $submission->status }}
                                                </span>
                                            @endif
                                        </td>
                                        @if(auth()->user()->hasRole('admin'))
                                        <td class="px-6 py-4 block md:table-cell before:content-['Aksi'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                            <form action="{{ route('submissions.destroy', $submission->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-1 text-white transition-all duration-200 rounded shadow bg-gradient-to-r from-fuchsia-500 to-purple-500 hover:scale-105 hover:from-purple-600 hover:to-fuchsia-600">
                                                    <i class='mr-1 text-lg bx bx-trash'></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                        @endif
                                    </tr>
                                @endif {{-- End if (isset($submission->nama)) --}}
                            @empty
                                {{-- Pesan jika tidak ada pengajuan --}}
                                <tr>
                                    <td colspan="6" class="block px-6 py-4 text-center text-gray-500 md:table-cell">Tidak ada pengajuan ditemukan.</td>
                                </tr>
                            @endforelse
                        @else
                            <tr>
                                <td colspan="6" class="block px-6 py-4 text-center text-gray-500 md:table-cell">Data pengajuan tidak tersedia.</td>
                            </tr>
                        @endisset
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Footer --}}
        <footer class="hidden py-4 mt-8 text-center text-white shadow-lg bg-gradient-to-r from-purple-500 to-fuchsia-500 lg:block">
            <div class="container mx-auto">
                <p class="text-sm font-semibold tracking-wide">
                    &copy; {{ date('Y') }} GajianKuy &mdash; Dibuat dengan <span class="animate-pulse">💜</span> oleh Tim IDN
                </p>
            </div>
        </footer>
    </main>
</x-app-layout>