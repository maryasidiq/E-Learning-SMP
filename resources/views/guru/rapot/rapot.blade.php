@extends('layouts.app2')
@section('pageTitle', 'Entry Nilai Rapot')
@section('title', 'Entry Nilai Rapot')
@section('content')
    <div class="w-full">
        <!-- Header -->
        <div class="bg-brand-500 text-gray-200 px-6 py-4 rounded-t-xl">
            <h3 class="text-lg font-semibold">Nilai Rapot Siswa</h3>
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
                            <td class="py-1">{{ $guru->mapel->nama_mapel }}</td>
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
                <form action="" method="post" id="formRapot">
                    @csrf
                    <input type="hidden" name="guru_id" value="{{ $guru->id }}">
                    <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">
                    <table
                        class="min-w-full text-sm text-left border border-gray-200 dark:border-gray-700 divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-700 dark:text-gray-300">
                            <tr>
                                <th class="px-4 py-2 text-center" rowspan="2">No.</th>
                                <th class="px-4 py-2" rowspan="2">Nama Siswa</th>
                                <th class="px-4 py-2 text-center" colspan="3">Pengetahuan</th>
                                <th class="px-4 py-2 text-center" colspan="3">Keterampilan</th>
                                <th class="px-4 py-2 text-center" rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th class="px-4 py-2 text-center">Nilai</th>
                                <th class="px-4 py-2 text-center">Predikat</th>
                                <th class="px-4 py-2 text-center">Deskripsi</th>
                                <th class="px-4 py-2 text-center">Nilai</th>
                                <th class="px-4 py-2 text-center">Predikat</th>
                                <th class="px-4 py-2 text-center">Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-100 dark:divide-gray-800">
                            @foreach ($siswa as $data)
                                <input type="hidden" name="siswa_id" value="{{ $data->id }}">
                                <tr class="dark:text-white">
                                    <td class="px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-2">{{ $data->nama_siswa }}</td>
                                    @if ($data->nilai($data->id))
                                        <td class="px-4 py-2 text-center">
                                            <input type="hidden" class="rapot_{{ $data->id }}"
                                                value="{{ $data->nilai($data->id)->id }}">
                                            <div>{{ $data->nilai($data->id)->p_nilai }}</div>
                                        </td>
                                        <td class="px-4 py-2 text-center">{{ $data->nilai($data->id)->p_predikat }}</td>
                                        <td class="px-4 py-2">
                                            <textarea class="w-full p-2 border rounded bg-gray-100 dark:bg-gray-900 dark:border" disabled>{{ $data->nilai($data->id)->p_deskripsi }}</textarea>
                                        </td>
                                        @if ($data->nilai($data->id)->p_nilai && $data->nilai($data->id)->k_nilai)
                                            <td class="px-4 py-2 text-center">{{ $data->nilai($data->id)->k_nilai }}</td>
                                            <td class="px-4 py-2 text-center">{{ $data->nilai($data->id)->k_predikat }}
                                            </td>
                                            <td class="px-4 py-2">
                                                <textarea class="w-full p-2 border rounded bg-gray-100 dark:bg-gray-900 dark:border" disabled>{{ $data->nilai($data->id)->k_deskripsi }}</textarea>
                                            </td>
                                            <td class="px-4 py-2 text-center">
                                                <span
                                                    class="bg-green-500 flex items-center justify-center w-8 h-8 rounded-full text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-check-icon lucide-check">
                                                        <path d="M20 6 9 17l-5-5" />
                                                    </svg>
                                                </span>
                                            </td>
                                        @else
                                            <td class="px-4 py-2 text-center">
                                                <input type="text" name="nilai" maxlength="2"
                                                    onkeypress="return inputAngka(event)"
                                                    class="form-input text-center w-16 mx-auto border rounded nilai_{{ $data->id }}"
                                                    data-ids="{{ $data->id }}">
                                            </td>
                                            <td class="px-4 py-2 text-center">
                                                <input type="text" name="predikat" placeholder="-"
                                                    class="form-input text-center predikat_{{ $data->id }}" disabled>
                                            </td>
                                            <td class="px-4 py-2">
                                                <textarea class="w-full p-2 border rounded bg-gray-100 dark:bg-gray-900 dark:border deskripsi_{{ $data->id }}" disabled></textarea>
                                            </td>
                                            <td class="px-4 py-2 text-center">
                                                <button type="button" id="submit-{{ $data->id }}"
                                                    class="btn_click bg-brand-700 hover:bg-brand-800 text-white px-3 py-1 rounded shadow-sm transition"
                                                    data-id="{{ $data->id }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="lucide lucide-save-icon lucide-save">
                                                        <path
                                                            d="M15.2 3a2 2 0 0 1 1.4.6l3.8 3.8a2 2 0 0 1 .6 1.4V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2z" />
                                                        <path d="M17 21v-7a1 1 0 0 0-1-1H8a1 1 0 0 0-1 1v7" />
                                                        <path d="M7 3v4a1 1 0 0 0 1 1h7" />
                                                    </svg>
                                                </button>
                                            </td>
                                        @endif
                                    @else
                                        <td class="px-4 py-2 text-center">-</td>
                                        <td class="px-4 py-2 text-center">-</td>
                                        <td class="px-4 py-2">
                                            <textarea class="w-full p-2 border rounded bg-gray-100 dark:bg-gray-900 dark:border" disabled></textarea>
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            <input type="text" name="nilai" maxlength="2"
                                                onkeypress="return inputAngka(event)"
                                                class="form-input text-center w-16 mx-auto border rounded nilai_{{ $data->id }}"
                                                data-ids="{{ $data->id }}">
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            <input type="text" name="predikat" placeholder="-"
                                                class="form-input text-center" disabled>
                                        </td>
                                        <td class="px-4 py-2">
                                            <textarea class="w-full p-2 border rounded bg-gray-100 dark:bg-gray-900 dark:border" disabled></textarea>
                                        </td>
                                        <td class="px-4 py-2 text-center">
                                            <span class="bg-yellow-500 flex items-center justify-center w-8 h-8 rounded-full text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-triangle-alert-icon lucide-triangle-alert">
                                                    <path
                                                        d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3" />
                                                    <path d="M12 9v4" />
                                                    <path d="M12 17h.01" />
                                                </svg>
                                            </span>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- @extends('template_backend.home')
@section('heading', 'Entry Nilai Rapot')
@section('page')
  <li class="breadcrumb-item active">Entry Nilai Rapot</li>
@endsection
@section('content')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Entry Nilai Rapot</h3>
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
                        <td>{{ $guru->mapel->nama_mapel }}</td>
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
                            <th class="ctr" rowspan="2">No.</th>
                            <th rowspan="2">Nama Siswa</th>
                            <th class="ctr" colspan="3">Pengetahuan</th>
                            <th class="ctr" colspan="3">Keterampilan</th>
                            <th class="ctr" rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th class="ctr">Nilai</th>
                            <th class="ctr">Predikat</th>
                            <th class="ctr">Deskripsi</th>
                            <th class="ctr">Nilai</th>
                            <th class="ctr">Predikat</th>
                            <th class="ctr">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="" method="post" id="formRapot">
                            @csrf
                            <input type="hidden" name="guru_id" value="{{$guru->id}}">
                            <input type="hidden" name="kelas_id" value="{{$kelas->id}}">
                            @foreach ($siswa as $data)
                                <input type="hidden" name="siswa_id" value="{{$data->id}}">
                                <tr>
                                    <td class="ctr">{{ $loop->iteration }}</td>
                                    <td>{{ $data->nama_siswa }}</td>
                                    @if ($data->nilai($data->id))
                                        <td class="ctr">
                                            <input type="hidden" class="rapot_{{$data->id}}" value="{{ $data->nilai($data->id)->id }}">
                                            <div class="text-center">{{ $data->nilai($data->id)->p_nilai }}</div>
                                        </td>
                                        <td class="ctr">
                                            <div class="text-center">{{ $data->nilai($data->id)->p_predikat }}</div>
                                        </td>
                                        <td class="ctr">
                                            <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled>{{ $data->nilai($data->id)->p_deskripsi }}</textarea>
                                        </td>
                                        @if ($data->nilai($data->id)->p_nilai && $data->nilai($data->id)->k_nilai)
                                            <td class="ctr">
                                                <div class="ka_{{$data->id}} text-center">{{ $data->nilai($data->id)->k_nilai }}</div> 
                                            </td>
                                            <td class="ctr">
                                                <div class="kp_{{$data->id}} text-center">{{ $data->nilai($data->id)->k_predikat }}</div>
                                            </td>
                                            <td class="ctr">
                                                <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled>{{ $data->nilai($data->id)->k_deskripsi }}</textarea>
                                            </td>
                                            <td class="ctr">
                                                <i class="fas fa-check" style="font-weight:bold;"></i>
                                            </td>
                                        @else
                                            <td class="ctr">
                                                <input type="text" name="nilai" maxlength="2" onkeypress="return inputAngka(event)" class="form-control text-center nilai_{{$data->id}}" data-ids="{{$data->id}}" autofocus autocomplete="off">
                                                <div class="knilai_{{$data->id}} text-center"></div>
                                            </td>
                                            <td class="ctr">
                                                <input type="text" name="predikat" class="form-control text-center predikat_{{$data->id}}" disabled>
                                                <div class="kpredikat_{{$data->id}} text-center"></div>
                                            </td>
                                            <td class="ctr">
                                                <textarea class="form-control swal2-textarea textarea-rapot deskripsi_{{$data->id}}" cols="50" rows="5" disabled></textarea>
                                            </td>
                                            <td class="ctr sub_{{$data->id}}">
                                                <button type="button" id="submit-{{$data->id}}" class="btn btn-default btn_click" data-id="{{$data->id}}"><i class="nav-icon fas fa-save"></i></button>
                                            </td>
                                        @endif
                                    @else
                                        <td class="ctr">
                                            <div class="text-center"></div>
                                        </td>
                                        <td class="ctr">
                                            <div class="text-center"></div>
                                        </td>
                                        <td class="ctr">
                                            <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled></textarea>
                                        </td>
                                        <td class="ctr">
                                            <input type="text" name="nilai" maxlength="2" onkeypress="return inputAngka(event)" class="form-control text-center nilai_{{$data->id}}" data-ids="{{$data->id}}" autofocus autocomplete="off">
                                            <div class="knilai_{{$data->id}} text-center"></div>
                                        </td>
                                        <td class="ctr">
                                            <input type="text" name="predikat" class="form-control text-center" disabled>
                                        </td>
                                        <td class="ctr">
                                            <textarea class="form-control swal2-textarea textarea-rapot" cols="50" rows="5" disabled></textarea>
                                        </td>
                                        <td class="ctr">
                                            <i class="fas fa-exclamation-triangle" style="font-weight:bold;"></i>
                                        </td>
                                    @endif
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
@section('script')
    <script>
        $("input[name=nilai]").keyup(function() {
            var id = $(this).attr('data-ids');
            var guru_id = $("input[name=guru_id]").val();
            var angka = $(".nilai_" + id).val();
            if (angka.length == 2) {
                $.ajax({
                    type: "GET",
                    data: {
                        id: guru_id,
                        nilai: angka
                    },
                    dataType: "JSON",
                    url: "{{ url('/rapot/predikat') }}",
                    success: function(data) {
                        $(".predikat_" + id).val(data[0]['predikat']);
                        $(".deskripsi_" + id).val(data[0]['deskripsi']);
                    },
                    error: function() {
                        toastr.warning("Tolong masukkan nilai kkm & predikat!");
                    }
                });
            } else {
                $(".predikat_" + id).val("");
                $(".deskripsi_" + id).val("");
            }
        });

        $(".btn_click").click(function() {
            var id = $(this).attr('data-id');
            var rapot = $(".rapot_" + id).val();
            var nilai = $(".nilai_" + id).val();
            var predikat = $(".predikat_" + id).val();
            var deskripsi = $(".deskripsi_" + id).val();
            var guru_id = $("input[name=guru_id]").val();
            var kelas_id = $("input[name=kelas_id]").val();
            var ok = ('<i class="fas fa-check" style="font-weight:bold;"></i>')

            if (nilai == "") {
                toastr.error("Form tidak boleh ada yang kosong!");
            } else {
                $.ajax({
                    url: "{{ route('rapot.store') }}",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: rapot,
                        siswa_id: id,
                        kelas_id: kelas_id,
                        guru_id: guru_id,
                        nilai: nilai,
                        predikat: predikat,
                        deskripsi: deskripsi,
                    },
                    success: function(data) {
                        $(".nilai_" + id).remove();
                        $(".predikat_" + id).remove();
                        $("#submit-" + id).remove();
                        $(".knilai_" + id).append(nilai);
                        $(".kpredikat_" + id).append(predikat);
                        $(".sub_" + id).append(ok);
                        toastr.success("Nilai rapot siswa berhasil ditambahkan!");
                    },
                    error: function(data) {
                        toastr.warning("Errors 404!");
                    }
                });
            }
        });

        $("#NilaiGuru").addClass("active");
        $("#liNilaiGuru").addClass("menu-open");
        $("#RapotGuru").addClass("active");
    </script>
@endsection
