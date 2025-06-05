<x-app-layout>

    @include('layouts.sidebar')
    <main class="px-4 pb-20 mx-auto md:ml-64 md:pb-0 max-w-7xl sm:px-6 lg:px-8">
    {{-- <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-center text-purple-800 drop-shadow">
            {{ __('Daftar Gaji Karyawan') }}
        </h2>
    </x-slot> --}}

    <div class="py-4"> {{-- Menggunakan py-4 untuk padding atas/bawah --}}
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if(auth()->check() && auth()->user()->hasRole('admin'))
            <div class="mb-6 text-left">
                <a href="{{ route('gaji.create') }}"
                   class="inline-flex items-center px-5 py-2 font-semibold text-white transition-all duration-300 rounded-lg shadow-lg bg-gradient-to-r from-purple-500 to-fuchsia-500 hover:scale-105 hover:from-fuchsia-600 hover:to-purple-600">
                    + Buat Gaji Baru
                </a>
            </div>
        @endif

        {{-- Container tabel dengan margin horizontal responsif --}}
        <div class="overflow-hidden bg-white shadow-lg rounded-xl ring-1 ring-purple-100 md:overflow-x-auto">
            <table class="block min-w-full text-sm text-left text-gray-700 md:table">
                <thead class="hidden text-xs text-purple-700 uppercase md:table-header-group bg-gradient-to-r from-purple-100 to-fuchsia-100">
                    <tr>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Pekerjaan</th>
                        <th class="px-6 py-3">Bulan & Tahun</th>
                        <th class="px-6 py-3">Tanggal Kirim</th>
                        <th class="px-6 py-3">Total Gaji</th>
                        <th class="px-6 py-3">Status</th>
                        <th class="px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group">
                    @forelse ($gaji as $gajis)
                        {{-- Kelas responsif untuk setiap baris / kartu di mobile --}}
                        <tr class="transition-all duration-300
                                   block md:table-row
                                   mb-4 md:mb-0 {{-- Margin bawah hanya di mobile --}}
                                   rounded-lg shadow md:rounded-none md:shadow-none {{-- Shadow & rounded hanya di mobile --}}
                                   odd:bg-white even:bg-purple-50
                                   hover:bg-gradient-to-r hover:from-purple-100 hover:to-fuchsia-100 hover:scale-[1.01]
                                   md:border-b"> {{-- Border bawah hanya di desktop --}}
                            <td class="px-6 py-4 block md:table-cell before:content-['Nama:'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                {{ $gajis->nama }}
                            </td>
                            <td class="px-6 py-4 block md:table-cell before:content-['Pekerjaan:'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                {{ $gajis->pekerjaan }}
                            </td>
                            <td class="px-6 py-4 block md:table-cell before:content-['Bulan_&_Tahun:'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                {{ $gajis->bulan }} {{ $gajis->tahun }}
                            </td>
                            <td class="px-6 py-4 block md:table-cell before:content-['Tanggal_Kirim:'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                {{ \Carbon\Carbon::parse($gajis->tanggal_kirim)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 block md:table-cell before:content-['Total_Gaji:'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                Rp {{ number_format($gajis->total_gaji, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 block md:table-cell before:content-['Status:'] before:block before:font-bold before:text-purple-700 md:before:content-none">
                                @if(auth()->user()->hasRole('admin'))
                                    <form action="{{ route('gaji.updateStatus', $gajis->id) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="inline-block px-3 py-1 text-sm border-gray-300 rounded focus:ring-purple-500 focus:border-purple-500">
                                            <option value="Sudah Dibayar" {{ $gajis->status === 'Sudah Dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
                                            <option value="Belum Dibayar" {{ $gajis->status === 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                                        </select>
                                    </form>
                                @else
                                    <span class="inline-block px-3 py-1 text-xs font-bold rounded shadow
                                        @if($gajis->status === 'Sudah Dibayar') bg-gradient-to-r from-green-500 to-fuchsia-500 text-white
                                        @else bg-yellow-500 text-white animate-pulse
                                        @endif">
                                        {{ $gajis->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 block md:table-cell before:content-['Aksi:'] before:block before:font-bold before:text-purple-700 md:before:content-none space-y-2 md:space-y-0 md:space-x-2">
                                {{-- Tombol Detail (untuk semua peran user) --}}
                                <a href="{{ route('gaji.show', $gajis->id) }}"
                                    class="inline-block px-3 py-1 text-sm text-white transition-all duration-200 bg-green-500 rounded-lg shadow hover:bg-green-600 hover:scale-105">Detail</a>

                                @if(auth()->user()->hasRole('admin'))
                                    {{-- Tombol Edit (hanya untuk admin) --}}
                                    <a href="{{ route('gaji.edit', $gajis->id) }}"
                                        class="inline-block px-3 py-1 text-sm text-white transition-all duration-200 bg-blue-500 rounded-lg shadow hover:bg-blue-600 hover:scale-105">Edit</a>
                                    {{-- Form Hapus (hanya untuk admin) --}}
                                    <form action="{{ route('gaji.destroy', $gajis->id) }}" method="POST" class="inline-block"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-block px-3 py-1 text-sm text-white transition-all duration-200 bg-red-500 rounded-lg shadow hover:bg-red-600 hover:scale-105">
                                            Hapus
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="block px-6 py-4 text-center text-gray-500 md:table-cell">
                                Belum ada data gaji yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </main>
</x-app-layout>