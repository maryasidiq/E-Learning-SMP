@php
    $layout = in_array(Auth::user()->role, ['Guru', 'Siswa'])
        ? 'layouts.app2'
        : 'template_backend.home';
@endphp

@extends($layout)

@section('heading', 'Edit Profile')
@section('pageTitle', 'Edit Profile')
@section('title', 'Edit Profile')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
    <li class="breadcrumb-item active">Edit Profile</li>
@endsection
@section('content')
    @if(in_array(Auth::user()->role, ['Guru', 'Siswa']))
        <!-- Modern Layout for Guru and Siswa -->
        <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Edit Profile {{ Auth::user()->name }}</h2>

                <form action="{{ route('pengaturan.ubah-profile') }}" method="post" class="space-y-6">
                    @csrf

                    @if (Auth::user()->role == "Guru")
                        <input type="hidden" name="role" value="{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->role : Auth::user()->role }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Guru</label>
                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="mapel_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Mapel</label>
                                    <select id="mapel_id" name="mapel_id[]" multiple
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('mapel_id') border-red-500 @enderror">
                                        <option value="">-- Pilih Mapel --</option>
                                        @foreach ($mapel as $data)
                                            <option value="{{ $data->id }}" @if (Auth::user()->guru(Auth::user()->id_card) && Auth::user()->guru(Auth::user()->id_card)->mapel->contains($data->id)) selected @endif>
                                                {{ $data->nama_mapel }}</option>
                                        @endforeach
                                    </select>
                                    @error('mapel_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="tmp_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tempat Lahir</label>
                                    <input type="text" id="tmp_lahir" name="tmp_lahir"
                                        value="{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->tmp_lahir : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('tmp_lahir') border-red-500 @enderror">
                                    @error('tmp_lahir') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="id_card" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor ID Card</label>
                                    <input type="text" id="id_card" name="id_card"
                                        value="{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->id_card : Auth::user()->id_card }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-600 dark:text-gray-400 cursor-not-allowed" disabled>
                                </div>

                                <div>
                                    <label for="telp" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)"
                                        value="{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->telp : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('telp') border-red-500 @enderror">
                                    @error('telp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="space-y-4">
                                <div>
                                    <label for="nip" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">NIP</label>
                                    <input type="text" id="nip" name="nip" onkeypress="return inputAngka(event)"
                                        value="{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->nip : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-600 dark:text-gray-400 cursor-not-allowed" disabled>
                                </div>

                                <div>
                                    <label for="jk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jenis Kelamin</label>
                                    <select id="jk" name="jk" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('jk') border-red-500 @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" @if (Auth::user()->guru(Auth::user()->id_card) && Auth::user()->guru(Auth::user()->id_card)->jk == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if (Auth::user()->guru(Auth::user()->id_card) && Auth::user()->guru(Auth::user()->id_card)->jk == 'P') selected @endif>Perempuan</option>
                                    </select>
                                    @error('jk') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                        value="{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->tgl_lahir : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('tgl_lahir') border-red-500 @enderror">
                                    @error('tgl_lahir') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="kode" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode Jadwal</label>
                                    <input type="text" id="kode" name="kode"
                                        value="{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->kode : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-600 dark:text-gray-400 cursor-not-allowed" disabled>
                                </div>
                            </div>
                        </div>

                    @elseif (Auth::user()->role == "Siswa")
                        <input type="hidden" name="role" value="{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->role : Auth::user()->role }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Kolom Kiri -->
                            <div class="space-y-4">
                                <div>
                                    <label for="no_induk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor Induk</label>
                                    <input type="text" id="no_induk" name="no_induk"
                                        value="{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->no_induk : Auth::user()->no_induk }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-600 dark:text-gray-400 cursor-not-allowed" disabled>
                                </div>

                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Siswa</label>
                                    <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('name') border-red-500 @enderror">
                                    @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="jk" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Jenis Kelamin</label>
                                    <select id="jk" name="jk" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('jk') border-red-500 @enderror">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" @if (Auth::user()->siswa(Auth::user()->no_induk) && Auth::user()->siswa(Auth::user()->no_induk)->jk == 'L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if (Auth::user()->siswa(Auth::user()->no_induk) && Auth::user()->siswa(Auth::user()->no_induk)->jk == 'P') selected @endif>Perempuan</option>
                                    </select>
                                    @error('jk') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="tmp_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tempat Lahir</label>
                                    <input type="text" id="tmp_lahir" name="tmp_lahir"
                                        value="{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->tmp_lahir : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('tmp_lahir') border-red-500 @enderror">
                                    @error('tmp_lahir') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <!-- Kolom Kanan -->
                            <div class="space-y-4">
                                <div>
                                    <label for="nis" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">NIS</label>
                                    <input type="text" id="nis" name="nis" onkeypress="return inputAngka(event)"
                                        value="{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->nis : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('nis') border-red-500 @enderror">
                                    @error('nis') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="kelas_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kelas</label>
                                    <select id="kelas_id" name="kelas_id" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('kelas_id') border-red-500 @enderror">
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $data)
                                            <option value="{{ $data->id }}" @if (Auth::user()->siswa(Auth::user()->no_induk) && Auth::user()->siswa(Auth::user()->no_induk)->kelas_id == $data->id) selected @endif>
                                                {{ $data->nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                    @error('kelas_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="telp" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nomor Telpon/HP</label>
                                    <input type="text" id="telp" name="telp" onkeypress="return inputAngka(event)"
                                        value="{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->telp : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('telp') border-red-500 @enderror">
                                    @error('telp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label for="tgl_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Tanggal Lahir</label>
                                    <input type="date" id="tgl_lahir" name="tgl_lahir"
                                        value="{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->tgl_lahir : '' }}"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('tgl_lahir') border-red-500 @enderror">
                                    @error('tgl_lahir') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Tombol Aksi -->
                    <div class="flex flex-col sm:flex-row justify-between items-center pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('profile') }}" class="w-full sm:w-auto mb-4 sm:mb-0 px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors inline-flex items-center justify-center">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        <button type="submit" class="w-full sm:w-auto px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition-colors inline-flex items-center justify-center">
                            <i class="fas fa-save mr-2"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @else
        <!-- Admin Layout (Original) -->
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title text-capitalize">Edit Profile {{ Auth::user()->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pengaturan.ubah-profile') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input id="name" type="text" value="{{ Auth::user()->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer d-flex flex-column flex-md-row justify-content-between">
                        <a href="#" name="kembali" class="btn btn-default mb-2 mb-md-0" id="back"><i class='nav-icon fas fa-arrow-left'></i>
                            &nbsp; Kembali</a>
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp;
                            Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    @endif
@endsection
@if(!in_array(Auth::user()->role, ['Guru', 'Siswa']))
@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#back').click(function () {
                window.location = "{{ route('profile') }}";
            });
        });
    </script>
@endsection
@endif
