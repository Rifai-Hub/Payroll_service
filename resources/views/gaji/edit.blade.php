<x-app-layout>
    @include('layouts.sidebar')
    <main class="ml-64">
        <div class="m-4 md:m-8">
            <div class="flex justify-center p-4 mb-6 rounded-lg shadow-lg bg-gradient-to-r from-purple-100 to-fuchsia-100">
                <h2 class="text-2xl font-bold leading-tight text-center text-purple-800 drop-shadow">
                Edit Data Gaji
            </h2>
            </div>
            

             
            @if(session('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 border border-green-300 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="p-6 bg-white shadow-lg rounded-xl ring-1 ring-purple-100">
                <form action="{{ route('gaji.update', $gaji->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $gaji->nama) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="pekerjaan" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $gaji->pekerjaan) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                        <input type="text" name="bulan" id="bulan" value="{{ old('bulan', $gaji->bulan) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                        <input type="number" name="tahun" id="tahun" value="{{ old('tahun', $gaji->tahun) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="gaji_bulananan" class="block text-sm font-medium text-gray-700">Gaji Bulanan</label>
                        <input type="number" name="gaji_bulananan" id="gaji_bulananan" value="{{ old('gaji_bulananan', $gaji->gaji_bulananan) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="tunjangan" class="block text-sm font-medium text-gray-700">Tunjangan</label>
                        <input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', $gaji->tunjangan) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="potongan" class="block text-sm font-medium text-gray-700">Potongan</label>
                        <input type="number" name="potongan" id="potongan" value="{{ old('potongan', $gaji->potongan) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>

                    <div class="mb-4">
                        <label for="total_gaji" class="block mb-2 text-sm font-medium text-gray-700">Total Gaji</label>
                        <input type="number" id="total_gaji" name="total_gaji" readonly
                            class="w-full px-4 py-2 bg-gray-100 border rounded-md shadow-sm" required>
                    </div>
                    
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_kirim" class="block text-sm font-medium text-gray-700">Tanggal Kirim</label>
                        <input type="date" name="tanggal_kirim" id="tanggal_kirim" value="{{ old('tanggal_kirim', $gaji->tanggal_kirim) }}"
                               class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                               required>
                    </div>
                    <div class="mb-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500"
                                required>
                            <option value="Sudah Dibayar" {{ $gaji->status === 'Sudah Dibayar' ? 'selected' : '' }}>Sudah Dibayar</option>
                            <option value="Belum Dibayar" {{ $gaji->status === 'Belum Dibayar' ? 'selected' : '' }}>Belum Dibayar</option>
                        </select>
                    </div>
                    <div class="flex justify-between mt-6 space-x-2">
                        <a href="{{ route('gaji.index') }}"
                           class="inline-block px-4 py-2 text-sm text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</a>
                        <button type="submit"
                                class="inline-block px-4 py-2 text-sm text-white rounded-lg bg-gradient-to-r from-purple-500 to-fuchsia-500 hover:from-fuchsia-600 hover:to-purple-600">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <script>
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