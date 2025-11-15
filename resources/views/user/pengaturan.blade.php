@php
    $layout = in_array(Auth::user()->role, ['Guru', 'Siswa'])
        ? 'layouts.app2'
        : 'template_backend.home';
@endphp

@extends($layout)

@section('heading', 'Profile')
@section('pageTitle', 'Profile')
@section('title', 'Profile')
@section('page')
    <li class="breadcrumb-item active">User Profile</li>
@endsection
@section('content')
    @if(in_array(Auth::user()->role, ['Guru', 'Siswa']))
        <!-- Modern Layout for Guru and Siswa -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <div class="text-center">
                            @if (Auth::user()->role == 'Guru')
                                <div class="relative inline-block">
                                    <img src="{{ Auth::user()->guru(Auth::user()->id_card) ? asset(Auth::user()->guru(Auth::user()->id_card)->foto) : asset('img/male.jpg') }}"
                                        class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-white shadow-lg" alt="Profile Picture">
                                    <a href="{{ route('pengaturan.edit-foto') }}"
                                        class="absolute bottom-0 right-0 bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-lg transition-colors">
                                        <i class="fas fa-camera text-sm"></i>
                                    </a>
                                </div>
                            @elseif (Auth::user()->role == 'Siswa')
                                <div class="relative inline-block">
                                    <img src="{{ Auth::user()->siswa(Auth::user()->no_induk) ? asset(Auth::user()->siswa(Auth::user()->no_induk)->foto) : asset('img/male.jpg') }}"
                                        class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-white shadow-lg" alt="Profile Picture">
                                    <a href="{{ route('pengaturan.edit-foto') }}"
                                        class="absolute bottom-0 right-0 bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full shadow-lg transition-colors">
                                        <i class="fas fa-camera text-sm"></i>
                                    </a>
                                </div>
                            @else
                                <img class="w-24 h-24 rounded-full mx-auto object-cover border-4 border-white shadow-lg" src="{{ asset('img/male.jpg') }}" alt="Profile Picture">
                            @endif

                            <h3 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">{{ Auth::user()->name }}</h3>
                            <p class="text-gray-500 dark:text-gray-400">{{ Auth::user()->role }}</p>
                        </div>

                        @if (Auth::user()->role == 'Guru')
                            <div class="mt-6 space-y-3">
                                <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">ID Card</span>
                                    <span class="text-sm text-gray-900 dark:text-white">{{ Auth::user()->id_card }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">NIP</span>
                                    <span class="text-sm text-gray-900 dark:text-white">{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->nip : '-' }}</span>
                                </div>
                            </div>
                        @elseif (Auth::user()->role == 'Siswa')
                            <div class="mt-6 space-y-3">
                                <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">No Induk</span>
                                    <span class="text-sm text-gray-900 dark:text-white">{{ Auth::user()->no_induk }}</span>
                                </div>
                                <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-400">NIS</span>
                                    <span class="text-sm text-gray-900 dark:text-white">{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->nis : '-' }}</span>
                                </div>
                            </div>
                        @endif

                        <div class="mt-6">
                            <a href="{{ route('pengaturan.profile') }}"
                                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition-colors inline-block text-center">
                                <i class="fas fa-edit mr-2"></i>Edit Profile
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Account Settings -->
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden mt-6">
                    <div class="p-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Pengaturan Akun</h4>
                        <div class="space-y-3">
                            <a href="{{ route('pengaturan.email') }}"
                                class="flex items-center p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-envelope text-blue-500"></i>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Ubah Email</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="fas fa-chevron-right text-gray-400"></i>
                                </div>
                            </a>
                            <a href="{{ route('pengaturan.password') }}"
                                class="flex items-center p-3 rounded-lg border border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-key text-green-500"></i>
                                </div>
                                <div class="ml-3 flex-1">
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">Ubah Password</p>
                                </div>
                                <div class="flex-shrink-0">
                                    <i class="fas fa-chevron-right text-gray-400"></i>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- About Me Section -->
            <div class="lg:col-span-2">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                    <div class="p-6">
                        <h4 class="text-xl font-semibold text-gray-900 dark:text-white mb-6">About Me</h4>

                        <div class="space-y-6">
                            <!-- Email -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <i class="far fa-envelope text-blue-500 mt-1"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Email</p>
                                    <p class="text-gray-900 dark:text-white">{{ Auth::user()->email }}</p>
                                </div>
                            </div>

                            @if (Auth::user()->role == 'Guru')
                                <!-- Guru Mapel -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-book text-green-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Guru Mapel</p>
                                        <p class="text-gray-900 dark:text-white">{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->mapel->pluck('nama_mapel')->join(', ') : '-' }}</p>
                                    </div>
                                </div>

                                <!-- Kode Jadwal -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="far fa-file-alt text-purple-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Kode Jadwal</p>
                                        <p class="text-gray-900 dark:text-white">{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->kode : '-' }}</p>
                                    </div>
                                </div>
                            @elseif (Auth::user()->role == 'Siswa')
                                <!-- Kelas -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-home text-orange-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Kelas</p>
                                        <p class="text-gray-900 dark:text-white">{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->kelas->nama_kelas : '-' }}</p>
                                    </div>
                                </div>
                            @endif

                            @if (Auth::user()->role == 'Guru')
                                <!-- Tempat Lahir -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tempat Lahir</p>
                                        <p class="text-gray-900 dark:text-white">{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->tmp_lahir : '-' }}</p>
                                    </div>
                                </div>
                            @elseif (Auth::user()->role == 'Siswa')
                                <!-- Tempat Lahir -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-map-marker-alt text-red-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tempat Lahir</p>
                                        <p class="text-gray-900 dark:text-white">{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->tmp_lahir : '-' }}</p>
                                    </div>
                                </div>
                            @endif

                            @if (Auth::user()->role == 'Guru')
                                <!-- Tanggal Lahir -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="far fa-calendar text-indigo-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tanggal Lahir</p>
                                        <p class="text-gray-900 dark:text-white">
                                            {{ Auth::user()->guru(Auth::user()->id_card) ? date('l, d F Y', strtotime(Auth::user()->guru(Auth::user()->id_card)->tgl_lahir)) : '-' }}
                                        </p>
                                    </div>
                                </div>
                            @elseif (Auth::user()->role == 'Siswa')
                                <!-- Tanggal Lahir -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="far fa-calendar text-indigo-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tanggal Lahir</p>
                                        <p class="text-gray-900 dark:text-white">
                                            {{ Auth::user()->siswa(Auth::user()->no_induk) ? date('l, d F Y', strtotime(Auth::user()->siswa(Auth::user()->no_induk)->tgl_lahir)) : '-' }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            @if (Auth::user()->role == 'Guru')
                                <!-- No Telepon -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone text-teal-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">No Telepon</p>
                                        <p class="text-gray-900 dark:text-white">{{ Auth::user()->guru(Auth::user()->id_card) ? Auth::user()->guru(Auth::user()->id_card)->telp : '-' }}</p>
                                    </div>
                                </div>
                            @elseif (Auth::user()->role == 'Siswa')
                                <!-- No Telepon -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-phone text-teal-500 mt-1"></i>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400">No Telepon</p>
                                        <p class="text-gray-900 dark:text-white">{{ Auth::user()->siswa(Auth::user()->no_induk) ? Auth::user()->siswa(Auth::user()->no_induk)->telp : '-' }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <!-- Admin Layout (Original) -->
        <div class="col-12">
            <div class="row">
                <div class="col-12 col-md-5">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset('img/male.jpg') }}"
                                    alt="User profile picture" style="max-width: 130px; width: 100%; height: auto;">
                            </div>
                            <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                            <p class="text-muted text-center">{{ Auth::user()->role }}</p>
                            <a href="{{ route('pengaturan.profile') }}" class="btn btn-primary btn-block"><b>Edit
                                    Profile</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Pengaturan Akun</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" style="margin-top: -21px;">
                                    <tbody>
                                        <tr>
                                            <td width="50"><i class="nav-icon fas fa-envelope"></i></td>
                                            <td>Ubah Email</td>
                                            <td width="50"><a href="{{ route('pengaturan.email') }}"
                                                    class="btn btn-default btn-sm">Edit</a></td>
                                        </tr>
                                        <tr>
                                            <td width="50"><i class="nav-icon fas fa-key"></i></td>
                                            <td>Ubah Password</td>
                                            <td width="50"><a href="{{ route('pengaturan.password') }}"
                                                    class="btn btn-default btn-sm">Edit</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->

                <div class="col-12 col-md-7">
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="far fa-envelope mr-1"></i> Email</strong>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                            <hr>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    @endif
@endsection
