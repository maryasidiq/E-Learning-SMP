@php
    $layout = in_array(Auth::user()->role, ['Guru', 'Siswa'])
        ? 'layouts.app2'
        : 'template_backend.home';
@endphp

@extends($layout)
@section('heading', 'Ubah Foto')
@section('pageTitle', 'Ubah Foto')
@section('title', 'Ubah Foto')
@section('page')
    <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
    <li class="breadcrumb-item active">Ubah Foto</li>
@endsection
@section('content')
    @if(in_array(Auth::user()->role, ['Guru', 'Siswa']))
        <!-- Modern Layout for Guru and Siswa -->
        <div
            class="max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Ubah Foto Profil</h2>

                <form action="{{ route('pengaturan.ubah-foto') }}" enctype="multipart/form-data" method="post"
                    class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <!-- Form Upload Section -->
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    @if(Auth::user()->role == 'Guru') Nama Guru @else Nama Siswa @endif
                                </label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-600 dark:text-gray-400 cursor-not-allowed"
                                    disabled>
                            </div>

                            <div>
                                <label for="foto" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Pilih
                                    File Foto</label>
                                <div class="relative">
                                    <input type="file" name="foto" id="foto" accept="image/*"
                                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('foto') border-red-500 @enderror">
                                    @error('foto') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                                </div>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Format: JPG, PNG, GIF. Maksimal 2MB.
                                </p>
                            </div>
                        </div>

                        <!-- Current Photo Preview Section -->
                        <div class="flex flex-col items-center justify-center space-y-4">
                            <h3 class="text-lg font-medium text-gray-900 dark:text-white">Foto Saat Ini</h3>
                            <div class="relative">
                                @if (Auth::user()->role == 'Guru')
                                    <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                                    <img src="{{ Auth::user()->guru(Auth::user()->id_card) ? asset(Auth::user()->guru(Auth::user()->id_card)->foto) : asset('img/male.jpg') }}"
                                        class="w-48 h-48 object-cover rounded-full border-4 border-gray-200 dark:border-gray-600 shadow-lg"
                                        alt="Foto Profil" />
                                @else
                                    <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                                    <img src="{{ Auth::user()->siswa(Auth::user()->no_induk) ? asset(Auth::user()->siswa(Auth::user()->no_induk)->foto) : asset('img/male.jpg') }}"
                                        class="w-48 h-48 object-cover rounded-full border-4 border-gray-200 dark:border-gray-600 shadow-lg"
                                        alt="Foto Profil" />
                                @endif
                            </div>
                            <p class="text-sm text-gray-500 dark:text-gray-400 text-center">Foto profil akan ditampilkan sebagai
                                gambar bulat</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div
                        class="flex flex-col sm:flex-row justify-between items-center pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('profile') }}"
                            class="w-full sm:w-auto mb-4 sm:mb-0 px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white font-medium rounded-lg transition-colors inline-flex items-center justify-center">
                            <i class="fas fa-arrow-left mr-2"></i> Kembali
                        </a>
                        <button type="submit"
                            class="w-full sm:w-auto px-6 py-2 bg-blue-500 hover:bg-blue-600 text-white font-medium rounded-lg transition-colors inline-flex items-center justify-center">
                            <i class="fas fa-upload mr-2"></i> Upload Foto
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
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <h3 class="card-title">Form ubah foto</h3>
                        </div>
                        <div class="col-12 col-md-6">
                            <h3 class="card-title">Foto Saat ini</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('pengaturan.ubah-foto') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}"
                                        disabled>
                                </div>
                                <div class="form-group">
                                    <label for="foto">File input</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="foto"
                                                class="custom-file-input @error('foto') is-invalid @enderror" id="foto">
                                            <label class="custom-file-label" for="foto">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
                                <input type="hidden" name="role" value="{{ Auth::user()->role }}">
                                <img src="{{ asset('img/male.jpg') }}" class="img img-responsive img-fluid rounded-circle"
                                    alt="" style="max-width: 200px; width: 100%; height: auto;" />
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer d-flex flex-column flex-md-row justify-content-between">
                        <a href="{{ route("profile") }}" class="btn btn-default mb-2 mb-md-0"><i
                                class='nav-icon fas fa-arrow-left'></i>
                            &nbsp; Kembali</a>
                        <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-upload"></i> &nbsp;
                            Upload</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    @endif
@endsection