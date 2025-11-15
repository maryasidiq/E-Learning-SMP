@php
  $layout = in_array(Auth::user()->role, ['Guru', 'Siswa'])
    ? 'layouts.app2'
    : 'template_backend.home';
@endphp

@extends($layout)
@section('heading', 'Ubah Email')
@section('pageTitle', 'Ubah Email')
@section('title', 'Ubah Email')
@section('page')
  <li class="breadcrumb-item active"><a href="{{ route('profile') }}">Pengaturan</a></li>
  <li class="breadcrumb-item active">Ubah Email</li>
@endsection
@section('content')
  @if(in_array(Auth::user()->role, ['Guru', 'Siswa']))
    <!-- Modern Layout for Guru and Siswa -->
    <div
      class="max-w-2xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
      <div class="p-6">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Ubah Email</h2>

        <form action="{{ route('pengaturan.ubah-email') }}" method="post" class="space-y-6">
          @csrf

          <div class="space-y-4">
            <div>
              <label for="email-old" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email
                Lama</label>
              <input id="email-old" type="email" value="{{ Auth::user()->email }}"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-gray-100 dark:bg-gray-600 dark:text-gray-400 cursor-not-allowed"
                disabled>
            </div>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email Baru</label>
              <input id="email" type="email" name="email" autofocus autocomplete="off"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white @error('email') border-red-500 @enderror"
                placeholder="Masukkan email baru">
              @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
              <i class="fas fa-save mr-2"></i> Update Email
            </button>
          </div>
        </form>
      </div>
    </div>
  @else
    <!-- Admin Layout (Original) -->
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title text-capitalize">Ubah Email {{ Auth::user()->name }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pengaturan.ubah-email') }}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="email-old">Email Lama</label>
                  <input id="email-old" type="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                </div>
                <div class="form-group">
                  <label for="email">Email Baru</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    autofocus autocomplete="off">
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