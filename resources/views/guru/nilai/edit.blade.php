@extends('layouts.app2')
@section('pageTitle', 'Edit Nilai Siswa')
@section('title', 'Edit Nilai Siswa')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Edit Nilai Siswa</h3>
        </div>

        <!-- Body -->
        <div class="bg-white dark:bg-gray-900 shadow rounded-b-xl p-6 space-y-6">
            <!-- Info Siswa -->
            <div>
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <tbody>
                        <tr>
                            <td class="py-1 w-48 font-medium">Nama Siswa</td>
                            <td class="py-1 w-4">:</td>
                            <td class="py-1">{{ $siswa->nama_siswa }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">NIS</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $siswa->no_induk }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Kelas</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $siswa->kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Mata Pelajaran</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $mapel->mapel->nama_mapel }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Form Edit Nilai -->
            <form id="edit-nilai-form" class="space-y-4">
                @csrf
                @foreach($existingNilai as $judul => $nilaiList)
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h4 class="text-lg font-semibold mb-4">{{ $judul }}</h4>
                        @foreach($nilaiList as $nilai)
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nilai</label>
                                    <input type="number" name="nilai[{{ $nilai->id }}]" value="{{ $nilai->nilai }}" min="0"
                                        max="100"
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Bobot</label>
                                    <input type="number" name="bobot[{{ $nilai->id }}]" value="{{ $nilai->bobot }}" min="1"
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        required>
                                </div>
                                <div class="form-group">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Sumber</label>
                                    <select name="sumber[{{ $nilai->id }}]"
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                                        required>
                                        <option value="manual" {{ $nilai->sumber == 'manual' ? 'selected' : '' }}>Manual</option>
                                        <option value="soal" {{ $nilai->sumber == 'soal' ? 'selected' : '' }}>Soal</option>
                                    </select>
                                </div>
                                <div class="form-group md:col-span-3" id="soal-input-{{ $nilai->id }}"
                                    style="display: {{ $nilai->sumber == 'soal' ? 'block' : 'none' }};">
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Soal</label>
                                    <select name="soal[{{ $nilai->id }}]"
                                        class="form-control mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                                        <option value="">Pilih Soal</option>
                                        @foreach(\App\Soal::where('mapel_id', $mapel->mapel_id)->get() as $soal)
                                            <option value="{{ $soal->id }}" {{ $nilai->soal == $soal->id ? 'selected' : '' }}>
                                                {{ $soal->judul }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <!-- Buttons -->
                <div class="flex gap-4">
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('nilai.show', Crypt::encrypt($mapel->mapel_id)) }}"
                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>
            </form>
                                        <input type="number" name="bobot[{{ $nilai->id }}]" value="{{ $nilai->bobot }}" min="1"
        </div>
    </div>

    <script>
        // Toggle soal input based on sumber selection
        @foreach($existingNilai as $judul => $nilaiList)
            @foreach($nilaiList as $nilai)
                document.querySelector('select[name="sumber[{{ $nilai->id }}]"]').addEventListener('change', function () {
                    const soalInput = document.getElementById('soal-input-{{ $nilai->id }}');
                    if (this.value === 'soal') {
                        soalInput.style.display = 'block';
                    } else {
                        soalInput.style.display = 'none';
                    }
                });
            @endforeach
        @endforeach

        document.getElementById('edit-nilai-form').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch('{{ route("guru.nilai.update", $siswa->id) }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                },
                body: formData
            })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        toastr.success(result.success);
                        setTimeout(() => {
                            window.location.href = '{{ route("nilai.show", Crypt::encrypt($mapel->mapel_id)) }}';
                        }, 1000);
                    } else {
                        toastr.error(result.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    toastr.error('Terjadi kesalahan saat menyimpan data');
                });
        });
    </script>
@endsection