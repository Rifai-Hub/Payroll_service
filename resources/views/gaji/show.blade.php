<x-app-layout>
    @include('layouts.sidebar')
    <main class="ml-64">
        <x-slot name="header">
            <h2 class="text-2xl font-bold leading-tight text-center text-purple-800 drop-shadow">
                {{ __('Detail Gaji Karyawan') }}
            </h2>
        </x-slot>

        <div class="py-8">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white shadow sm:rounded-lg">
                    <h3 class="mb-6 text-xl font-semibold text-gray-800">Informasi Gaji:</h3>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div class="col-span-1">
                            <p class="mb-2 text-sm font-medium text-gray-700">Nama Karyawan:</p>
                            <p class="mb-4 text-base font-semibold text-gray-900">{{ $gaji->nama }}</p>

                            <p class="mb-2 text-sm font-medium text-gray-700">Pekerjaan:</p>
                            <p class="mb-4 text-base font-semibold text-gray-900">{{ $gaji->pekerjaan }}</p>

                            <p class="mb-2 text-sm font-medium text-gray-700">Bulan & Tahun Gaji:</p>
                            <p class="mb-4 text-base font-semibold text-gray-900">{{ $gaji->bulan }} {{ $gaji->tahun }}</p>

                            <p class="mb-2 text-sm font-medium text-gray-700">Tanggal Kirim Gaji:</p>
                            <p class="mb-4 text-base font-semibold text-gray-900">{{ \Carbon\Carbon::parse($gaji->tanggal_kirim)->format('d F Y') }}</p>
                        </div>

                        <div class="col-span-1">
                            <p class="mb-2 text-sm font-medium text-gray-700">Gaji Bulanan:</p>
                            <p class="mb-4 text-base font-semibold text-gray-900">Rp {{ number_format($gaji->gaji_bulananan, 0, ',', '.') }}</p>

                            <p class="mb-2 text-sm font-medium text-gray-700">Tunjangan:</p>
                            <p class="mb-4 text-base font-semibold text-gray-900">Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}</p>
                            {{-- Tampilkan Keterangan Tunjangan jika ada datanya --}}
                            @if($gaji->keterangan_tunjangan)
                                <p class="mb-4 text-xs italic text-gray-600">Keterangan Tunjangan: {{ $gaji->keterangan_tunjangan }}</p>
                            @endif

                            <p class="mb-2 text-sm font-medium text-gray-700">Potongan:</p>
                            <p class="mb-4 text-base font-semibold text-gray-900">Rp {{ number_format($gaji->potongan, 0, ',', '.') }}</p>
                            {{-- Tampilkan Keterangan Potongan jika ada datanya --}}
                            @if($gaji->keterangan_potongan)
                                <p class="mb-4 text-xs italic text-gray-600">Keterangan Potongan: {{ $gaji->keterangan_potongan }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="pt-4 mt-6 border-t border-gray-200">
                        <p class="mb-2 text-lg font-medium text-gray-700">Total Gaji Diterima:</p>
                        <p class="mb-4 text-2xl font-bold text-green-700">Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}</p>

                        <p class="mb-2 text-sm font-medium text-gray-700">Status Pembayaran:</p>
                        <span class="inline-block px-3 py-1 text-sm font-bold rounded-full shadow
                            @if($gaji->status === 'Sudah Dibayar') bg-green-500 text-white
                            @else bg-yellow-500 text-white animate-pulse
                            @endif">
                            {{ $gaji->status }}
                        </span>
                    </div>

                    <div class="flex justify-end mt-8">
                        <a href="{{ route('gaji.index') }}" class="px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 rounded-md shadow-sm hover:bg-gray-300">Kembali ke Daftar Gaji</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>