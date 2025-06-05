<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-center text-purple-800 drop-shadow">
            {{ __('Buat Gaji Baru') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-xs px-4 mx-auto sm:max-w-xl sm:px-6 lg:max-w-4xl lg:px-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <form action="{{ route('gaji.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="karyawan_id" class="block mb-2 text-sm font-medium text-gray-700">Pilih Karyawan</label>
                        <select id="karyawan_id" name="karyawan_id" required
                            class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500">
                            <option value="">-- Pilih --</option>
                            @foreach($karyawans as $karyawan)
                                <option value="{{ $karyawan->id }}"
                                    data-nama="{{ $karyawan->nama }}"
                                    data-pekerjaan="{{ $karyawan->pekerjaan }}">
                                    {{ $karyawan->nama }} - {{ $karyawan->pekerjaan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" id="nama" name="nama" readonly
                            class="w-full px-4 py-2 bg-gray-100 border rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="pekerjaan" class="block mb-2 text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" id="pekerjaan" name="pekerjaan" readonly
                            class="w-full px-4 py-2 bg-gray-100 border rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                    <label for="bulan" class="block mb-2 text-sm font-medium text-gray-700">Bulan</label>
                    <select id="bulan" name="bulan"
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                    <option value="">-- Pilih Bulan --</option>
                    @foreach ([
                        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                      ] as $bulan)
                      <option value="{{ $bulan }}">{{ $bulan }}</option>
                    @endforeach
                      </select>
                    </div>

                    <div class="mb-4">
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-700">Tahun</label>
                    <select id="tahun" name="tahun"
                    class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                        <option value="">-- Pilih Tahun --</option>
                    @for ($tahun = 2020; $tahun <= 2030; $tahun++)
                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                      @endfor
                    </select>
                    </div>

                    <div class="mb-4">
                        <label for="gaji_bulananan" class="block mb-2 text-sm font-medium text-gray-700">Gaji Bulanan</label>
                        <input type="number" id="gaji_bulananan" name="gaji_bulananan"
                            class="w-full px-4 py-2 border rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="tunjangan" class="block mb-2 text-sm font-medium text-gray-700">Tunjangan</label>
                            <input type="number" name="tunjangan" id="tunjangan"
                                class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="keterangan_tunjangan" class="block mb-1 text-sm text-gray-600">Keterangan Tunjangan (opsional)</label>
                             <input type="text" name="keterangan_tunjangan" id="keterangan_tunjangan"
                                 class="w-full px-3 py-1 text-sm border rounded-md shadow-sm focus:ring-purple-300 focus:border-purple-300"
                                  placeholder="Contoh: Bonus project, lembur, dll">
                    </div>

                    <div class="mb-4">
                        <label for="potongan" class="block mb-2 text-sm font-medium text-gray-700">Potongan</label>
                            <input type="number" name="potongan" id="potongan"
                                class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                    </div>
                    <div class="mb-4">
                        <label for="keterangan_potongan" class="block mb-1 text-sm text-gray-600">Keterangan Potongan (opsional)</label>
                            <input type="text" name="keterangan_potongan" id="keterangan_potongan"
                                 class="w-full px-3 py-1 text-sm border rounded-md shadow-sm focus:ring-purple-300 focus:border-purple-300"
                                  placeholder="Contoh: Terlambat, izin, dsb">
                    </div>

                    <div class="mb-4">
                        <label for="total_gaji" class="block mb-2 text-sm font-medium text-gray-700">Total Gaji</label>
                        <input type="number" id="total_gaji" name="total_gaji" readonly
                            class="w-full px-4 py-2 bg-gray-100 border rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-6">
                        <label for="tanggal_kirim" class="block mb-2 text-sm font-medium text-gray-700">Tanggal Kirim</label>
                        <input type="date" id="tanggal_kirim" name="tanggal_kirim"
                            class="w-full px-4 py-2 border rounded-md shadow-sm" required>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="block mb-2 text-sm font-medium text-gray-700">Status</label>
                        <select id="status" name="status" class="w-full px-4 py-2 border rounded-md shadow-sm focus:ring-purple-500 focus:border-purple-500" required>
                            <option value="">-- Pilih Status --</option>
                            <option value="Sudah Dibayar">Sudah Dibayar</option>
                            <option value="Belum Dibayar">Belum Dibayar</option>
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-purple-700">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Auto-set nama dan pekerjaan dari dropdown
        document.getElementById('karyawan_id').addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            document.getElementById('nama').value = selected.getAttribute('data-nama') || '';
            document.getElementById('pekerjaan').value = selected.getAttribute('data-pekerjaan') || '';
        });

        // Hitung total gaji otomatis
        function hitungTotal() {
            const gaji = parseFloat(document.getElementById('gaji_bulananan').value) || 0;
            const tunjangan = parseFloat(document.getElementById('tunjangan').value) || 0;
            const potongan = parseFloat(document.getElementById('potongan').value) || 0;
            document.getElementById('total_gaji').value = gaji + tunjangan - potongan;
        }

        document.getElementById('gaji_bulananan').addEventListener('input', hitungTotal);
        document.getElementById('tunjangan').addEventListener('input', hitungTotal);
        document.getElementById('potongan').addEventListener('input', hitungTotal);
    </script>
</x-app-layout>