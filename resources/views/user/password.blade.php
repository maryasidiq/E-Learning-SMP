@php
  $layout = in_array(Auth::user()->role, ['Guru', 'Siswa'])
    ? 'layouts.app2'
    : 'template_backend.home';
@endphp

@extends($layout)
@section('heading', 'Ubah Password')
@section('pageTitle', 'Ubah Password')
@section('title', 'Ubah Password')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
  <li class="breadcrumb-item active">Ubah Password</li>
@endsection
@section('content')
  @if(in_array(Auth::user()->role, ['Guru', 'Siswa']))
    <!-- Modern Layout for Guru and Siswa -->
    <div
      class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Ubah Password</h2>

        <form action="{{ route('pengaturan.ubah-password') }}" method="post" class="space-y-6">
          @csrf

          <div class="space-y-4">
            <div class="relative">
              <label for="password-old" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password
                Lama</label>
              <div class="relative">
                <input id="password-old" type="password" name="password_lama" autocomplete="old-password"
                  class="w-full px-3 py-2 pr-10 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                  placeholder="Masukkan password lama">
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  onclick="togglePassword('password-old')">
                  <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="password-old-icon"></i>
                </button>
              </div>
            </div>

            <div class="relative">
              <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Password
                Baru</label>
              <div class="relative">
                <input id="password" type="password" name="password" autocomplete="new-password"
                  class="w-full px-3 py-2 pr-10 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('password') border-red-500 @enderror"
                  placeholder="Masukkan password baru">
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  onclick="togglePassword('password')">
                  <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="password-icon"></i>
                </button>
              </div>
              @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="relative">
              <label for="password-confirm"
                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Konfirmasi Password</label>
              <div class="relative">
                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password"
                  class="w-full px-3 py-2 pr-10 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('password_confirmation') border-red-500 @enderror"
                  placeholder="Konfirmasi password baru">
                <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center"
                  onclick="togglePassword('password-confirm')">
                  <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="password-confirm-icon"></i>
                </button>
              </div>
              @error('password_confirmation') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
              <i class="fas fa-save mr-2"></i> Update Password
            </button>
          </div>
        </form>
      </div>
    </div>

    <script>
      function togglePassword(inputId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(inputId + '-icon');
        if (input.type === 'password') {
          input.type = 'text';
          icon.classList.remove('fa-eye');
          icon.classList.add('fa-eye-slash');
        } else {
          input.type = 'password';
          icon.classList.remove('fa-eye-slash');
          icon.classList.add('fa-eye');
        }
      }
    </script>
  @else
    <!-- Admin Layout (Original) -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title text-capitalize">Ubah Password {{ Auth::user()->name }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pengaturan.ubah-password') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="password-old">Password Lama</label>
                  <input id="password-old" type="password" class="form-control" name="password_lama"
                    autocomplete="old-password">
                </div>
                <div class="form-group">
                  <label for="password">Password Baru</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" autocomplete="new-password">
                </div>
                <div class="form-group">
                  <label for="password-confirm">Konfirmasi Password</label>
                  <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password_confirmation" autocomplete="new-password">
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <a href="#" name="kembali" class="btn btn-default" id="back"><i class='nav-icon fas fa-arrow-left'></i> &nbsp;
              Kembali</a> &nbsp;
            <button name="submit" class="btn btn-primary"><i class="nav-icon fas fa-save"></i> &nbsp; Update</button>
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