@extends('layouts.app2')
@section('pageTitle', 'Entry Nilai Ulangan')
@section('title', 'Entry Nilai Ulangan')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Nilai Ulangan Siswa</h3>
        </div>

        <!-- Body -->
        <div class="bg-white dark:bg-gray-900 shadow rounded-b-xl p-6 space-y-6">
            <!-- Info Kelas -->
            <div>
                <table class="w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <tbody>
                        <tr>
                            <td class="py-1 w-48 font-medium">Nama Kelas</td>
                            <td class="py-1 w-4">:</td>
                            <td class="py-1">{{ $kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Wali Kelas</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $kelas->guru->nama_guru }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Jumlah Siswa</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $siswa->count() }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Mata Pelajaran</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $guru->mapel->pluck('nama_mapel')->join(', ') }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Guru Mata Pelajaran</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $guru->nama_guru }}</td>
                        </tr>
                        @php
                            $bulan = date('m');
                            $tahun = date('Y');
                        @endphp
                        <tr>
                            <td class="py-1 font-medium">Semester</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $bulan > 6 ? 'Semester Ganjil' : 'Semester Genap' }}</td>
                        </tr>
                        <tr>
                            <td class="py-1 font-medium">Tahun Pelajaran</td>
                            <td class="py-1">:</td>
                            <td class="py-1">{{ $bulan > 6 ? "$tahun/" . ($tahun + 1) : $tahun - 1 . "/$tahun" }}</td>
                        </tr>
                    </tbody>
                </table>
                <hr class="my-4 border-t border-gray-200 dark:border-gray-700">
            </div>

            <!-- Tabel Nilai -->
            <div class="overflow-x-auto">
                <form action="" method="post">
                    @csrf
                    <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                    <table
                        class="min-w-full text-sm text-left border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                            <tr>
                                <th class="px-4 py-2 text-center">No.</th>
                                <th class="px-4 py-2">Nama Siswa</th>
                                <th class="px-4 py-2 text-center">ULHA 1</th>
                                <th class="px-4 py-2 text-center">ULHA 2</th>
                                <th class="px-4 py-2 text-center">UTS</th>
                                <th class="px-4 py-2 text-center">ULHA 3</th>
                                <th class="px-4 py-2 text-center">UAS</th>
                                <th class="px-4 py-2 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800">
                            @foreach ($siswa as $data)
                                <input type="hidden" name="siswa_id" value="{{ $data->id }}">
                                <tr class="dark:text-white" data-siswa="{{ $data->id }}">
                                    <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">
                                        {{ $data->nama_siswa }}
                                        <input type="hidden" class="ulangan_id"
                                            value="{{ optional($data->ulangan($data->id))->id }}">
                                    </td>
                                    @foreach (['ulha_1', 'ulha_2', 'uts', 'ulha_3', 'uas'] as $key)
                                        <td class="px-4 py-2 text-center">
                                            @php $val = optional($data->ulangan($data->id))[$key] ?? null; @endphp
                                            @if ($val)
                                                <div>{{ $val }}</div>
                                                <input type="hidden" class="{{ $key }}" value="{{ $val }}">
                                            @else
                                                <input type="text" maxlength="2" onkeypress="return inputAngka(event)"
                                                    class="form-input text-center {{ $key }} w-16 mx-auto border border-gray-300 rounded">
                                            @endif
                                        </td>
                                    @endforeach
                                    <td class="px-4 py-2 text-center">
                                        @if ($data->nilai($data->id))
                                            <i class="fas fa-check font-bold text-green-500"></i>
                                        @else
                                            <button type="button" id="submit-{{ $data->id }}"
                                                class="btn_click bg-brand-700 hover:bg-brand-800 text-white px-3 py-1 rounded shadow-sm transition"
                                                data-id="{{ $data->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="24" viewBox="0 0 24 24"
                                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="lucide lucide-save-icon lucide-save">
                                                    <path
                                                        d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                                                    <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7" />
                                                    <path d="M7 3v4a1 1 0 0 0 1 1h7" />
                                                </svg>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(".btn_click").click(function () {
            let row = $(this).closest("tr");
            let id = row.data("siswa");
            let data = {
                _token: '{{ csrf_token() }}',
                siswa_id: id,
                guru_id: $("input[name=guru_id]").val(),
                kelas_id: $("input[name=kelas_id]").val(),
                id: row.find(".ulangan_id").val(),
                ulha_1: row.find(".ulha_1").val(),
                ulha_2: row.find(".ulha_2").val(),
                uts: row.find(".uts").val(),
                ulha_3: row.find(".ulha_3").val(),
                uas: row.find(".uas").val(),
            };

            $.ajax({
                url: "{{ route('ulangan.store') }}",
                type: "POST",
                dataType: 'json',
                data: data,
                success: function (data) {
                    toastr.success("Nilai ulangan siswa berhasil ditambahkan!");
                    location.reload();
                },
                error: function (data) {
                    toastr.warning("Gagal menyimpan data.");
                    console.log(data);
                }
            });
        });
    </script>
@endsection

{{-- @extends('template_backend.home')
@section('heading', 'Entry Nilai Ulangan')
@section('page')
<li class="breadcrumb-item active">Entry Nilai Ulangan</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Entry Nilai Ulangan</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table" style="margin-top: -10px;">
                        <tr>
                            <td>Nama Kelas</td>
                            <td>:</td>
                            <td>{{ $kelas->nama_kelas }}</td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                            <td>:</td>
                            <td>{{ $kelas->guru->nama_guru }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah Siswa</td>
                            <td>:</td>
                            <td>{{ $siswa->count() }}</td>
                        </tr>
                        <tr>
                            <td>Mata Pelajaran</td>
                            <td>:</td>
                            <td>{{ $guru->mapel->pluck('nama_mapel')->join(', ') }}</td>
                        </tr>
                        <tr>
                            <td>Guru Mata Pelajaran</td>
                            <td>:</td>
                            <td>{{ $guru->nama_guru }}</td>
                        </tr>
                        @php
                        $bulan = date('m');
                        $tahun = date('Y');
                        @endphp
                        <tr>
                            <td>Semester</td>
                            <td>:</td>
                            <td>
                                @if ($bulan > 6)
                                {{ 'Semester Ganjil' }}
                                @else
                                {{ 'Semester Genap' }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Tahun Pelajaran</td>
                            <td>:</td>
                            <td>
                                @if ($bulan > 6)
                                {{ $tahun }}/{{ $tahun+1 }}
                                @else
                                {{ $tahun-1 }}/{{ $tahun }}
                                @endif
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th class="ctr">No.</th>
                                <th>Nama Siswa</th>
                                <th class="ctr">ULHA 1</th>
                                <th class="ctr">ULHA 2</th>
                                <th class="ctr">UTS</th>
                                <th class="ctr">ULHA 3</th>
                                <th class="ctr">UAS</th>
                                <th class="ctr">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="guru_id" value="{{$guru->id}}">
                                <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                                @foreach ($siswa as $data)
                                <input type="hidden" name="siswa_id" value="{{$data->id}}">
                                <tr>
                                    <td class="ctr">{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $data->nama_siswa }}
                                        @if ($data->ulangan($data->id) && $data->ulangan($data->id)['id'])
                                        <input type="hidden" name="ulangan_id" class="ulangan_id_{{$data->id}}"
                                            value="{{ $data->ulangan($data->id)->id }}">
                                        @else
                                        <input type="hidden" name="ulangan_id" class="ulangan_id_{{$data->id}}"
                                            value="">
                                        @endif
                                    </td>
                                    <td class="ctr">
                                        @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_1'])
                                        <div class="text-center">{{ $data->ulangan($data->id)['ulha_1'] }}</div>
                                        <input type="hidden" name="ulha_1" class="ulha_1_{{$data->id}}"
                                            value="{{ $data->ulangan($data->id)['ulha_1'] }}">
                                        @else
                                        <input type="text" name="ulha_1" maxlength="2"
                                            onkeypress="return inputAngka(event)" style="margin: auto;"
                                            class="form-control text-center ulha_1_{{$data->id}}" autocomplete="off">
                                        @endif
                                    </td>
                                    <td class="ctr">
                                        @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_2'])
                                        <div class="text-center">{{ $data->ulangan($data->id)['ulha_2'] }}</div>
                                        <input type="hidden" name="ulha_2" class="ulha_2_{{$data->id}}"
                                            value="{{ $data->ulangan($data->id)['ulha_2'] }}">
                                        @else
                                        <input type="text" name="ulha_2" maxlength="2"
                                            onkeypress="return inputAngka(event)" style="margin: auto;"
                                            class="form-control text-center ulha_2_{{$data->id}}" autocomplete="off">
                                        @endif
                                    </td>
                                    <td class="ctr">
                                        @if ($data->ulangan($data->id) && $data->ulangan($data->id)['uts'])
                                        <div class="text-center">{{ $data->ulangan($data->id)['uts'] }}</div>
                                        <input type="hidden" name="uts" class="uts_{{$data->id}}"
                                            value="{{ $data->ulangan($data->id)['uts'] }}">
                                        @else
                                        <input type="text" name="uts" maxlength="2"
                                            onkeypress="return inputAngka(event)" style="margin: auto;"
                                            class="form-control text-center uts_{{$data->id}}" autocomplete="off">
                                        @endif
                                    </td>
                                    <td class="ctr">
                                        @if ($data->ulangan($data->id) && $data->ulangan($data->id)['ulha_3'])
                                        <div class="text-center">{{ $data->ulangan($data->id)['ulha_3'] }}</div>
                                        <input type="hidden" name="ulha_3" class="ulha_3_{{$data->id}}"
                                            value="{{ $data->ulangan($data->id)['ulha_3'] }}">
                                        @else
                                        <input type="text" name="ulha_3" maxlength="2"
                                            onkeypress="return inputAngka(event)" style="margin: auto;"
                                            class="form-control text-center ulha_3_{{$data->id}}" autocomplete="off">
                                        @endif
                                    </td>
                                    <td class="ctr">
                                        @if ($data->ulangan($data->id) && $data->ulangan($data->id)['uas'])
                                        <div class="text-center">{{ $data->ulangan($data->id)['uas'] }}</div>
                                        <input type="hidden" name="uas" class="uas_{{$data->id}}"
                                            value="{{ $data->ulangan($data->id)['uas'] }}">
                                        @else
                                        <input type="text" name="uas" maxlength="2"
                                            onkeypress="return inputAngka(event)" style="margin: auto;"
                                            class="form-control text-center uas_{{$data->id}}" autocomplete="off">
                                        @endif
                                    </td>
                                    <td class="ctr sub_{{$data->id}}">
                                        @if ($data->nilai($data->id))
                                        <i class="fas fa-check" style="font-weight:bold;"></i>
                                        @else
                                        <button type="button" id="submit-{{$data->id}}"
                                            class="btn btn-default btn_click" data-id="{{$data->id}}"><i
                                                class="nav-icon fas fa-save"></i></button>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection --}}