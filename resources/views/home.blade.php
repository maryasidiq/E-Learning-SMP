@extends('layouts.app2')
@section('pageTitle', 'Dashboard')
@section('title', 'Dashboard')
@section('content')
    <h1 class="text-2xl mb-4 dark:text-gray-300">Jadwal Sekarang</h1>
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="max-w-full overflow-x-auto">
            <table class="min-w-full">
                <!-- table header start -->
                <thead>
                    <tr class="border-b border-gray-100 dark:border-gray-800">
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Jam Pelajaran
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Mata Pelajaran
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Kelas
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Ruang Kelas
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-bold text-theme-sm dark:text-gray-300">
                                    Ket.
                                </p>
                            </div>
                        </th>
                    </tr>
                </thead>
                <!-- table header end -->
                <!-- table body start -->
                <tbody id="data-jadwal" class="divide-y divide-gray-100 dark:divide-gray-800">
                    @php
                        $hari = date('w');
                        $jam = date('H:i');
                    @endphp
                    @if ($jadwal->count() > 0)
                        @if (
                            ($hari == '1' && $jam >= '09:45' && $jam <= '10:15') ||
                                ($hari == '1' && $jam >= '12:30' && $jam <= '13:15') ||
                                ($hari == '2' && $jam >= '09:15' && $jam <= '09:45') ||
                                ($hari == '2' && $jam >= '12:00' && $jam <= '13:00') ||
                                ($hari == '3' && $jam >= '09:15' && $jam <= '09:45') ||
                                ($hari == '3' && $jam >= '12:00' && $jam <= '13:00') ||
                                ($hari == '4' && $jam >= '09:15' && $jam <= '09:45') ||
                                ($hari == '4' && $jam >= '12:00' && $jam <= '13:00') ||
                                ($hari == '5' && $jam >= '09:00' && $jam <= '09:15') ||
                                ($hari == '5' && $jam >= '11:15' && $jam <= '13:00'))
                            <tr>
                                <td colspan='5 bg-white dark:bg-gray-800 dark:text-gray-300'
                                    style='text-align:center;font-weight:bold;font-size:18px;'>Waktunya
                                    Istirahat!</td>
                            </tr>
                        @else
                            @foreach ($jadwal as $data)
                                <tr>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex items-center">
                                            <div class="flex items-center gap-3">
                                                <div class="w-10 h-10 overflow-hidden rounded-full">
                                                    <img src="{{ $data->guru->foto }}" alt="brand" />
                                                </div>

                                                <span
                                                    class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                                    {{ $data->jam_mulai . ' - ' . $data->jam_selesai }}
                                                </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex flex-col">
                                            <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                                {{ $data->mapel->nama_mapel }}
                                            </span>
                                            <small
                                                class="text-gray-500 text-theme-sm dark:text-gray-400">{{ $data->guru->nama_guru }}</small>
                                        </div>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $data->kelas->nama_kelas }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <span class="text-gray-800 text-theme-sm dark:text-gray-400">
                                            {{ $data->ruang->nama_ruang }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-4 sm:px-6">
                                        <div class="flex items-center">
                                            @if ($data->absen($data->guru_id))
                                                <div
                                                    style="width:30px;height:30px;background:#{{ $data->absen($data->guru_id) }}">
                                                </div>
                                            @elseif (date('H:i:s') >= '09:00:00')
                                                <div style="width:30px;height:30px;background:#F00"></div>
                                            @else
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    @elseif ($jam <= '07:00')
                        <tr>
                            <td colspan='5' class="py-4 bg-white dark:bg-gray-800 dark:text-gray-300"
                                style='text-align:center;font-weight:bold;font-size:18px;'>
                                Jam Pelajaran Hari ini Akan Segera Dimulai!</td>
                        </tr>
                    @elseif (
                        ($hari == '1' && $jam >= '16:15') ||
                            ($hari == '2' && $jam >= '16:00') ||
                            ($hari == '3' && $jam >= '16:00') ||
                            ($hari == '4' && $jam >= '16:00') ||
                            ($hari == '5' && $jam >= '15:40'))
                        <tr>
                            <td colspan='5' class="py-4 bg-white dark:bg-gray-800 dark:text-gray-300"
                                style='text-align:center;font-weight:bold;font-size:18px;'>
                                Jam Pelajaran Hari ini Sudah Selesai!</td>
                        </tr>
                    @elseif ($hari == '0' || $hari == '6')
                        <tr>
                            <td colspan='5' class="py-4 bg-white dark:bg-gray-800 dark:text-gray-300"
                                style='text-align:center;font-weight:bold;font-size:18px;'>
                                Sekalah Libur!</td>
                        </tr>
                    @elseif($hari == '1' && $jam >= '07:00' && $jam <= '07:30')
                        <tr>
                            <td colspan='5' class="py-4 bg-white dark:bg-gray-800 dark:text-gray-300"
                                style='text-align:center;font-weight:bold;font-size:18px;'>
                                Waktunya Upacara Bendera!</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan='5' class="py-4 bg-white dark:bg-gray-800 dark:text-gray-300"
                                style='text-align:center;font-weight:bold;font-size:18px;'>
                                Tidak Ada Data Jadwal!</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div class="grid grid-cols-2 gap-4 mt-4">
        <div class="grid-cols-1 bg-white dark:bg-gray-800 rounded">
            <div class="bg-yellow-300 dark:bg-gray-800 p-2.5 rounded-t dark:border-b dark:border-b-gray-400">
                <h3 class="font-bold dark:text-gray-300">
                    Pengumuman
                </h3>
            </div>
            <div class="p-2.5">
                <p class="font-light dark:text-gray-400">
                    {!! $pengumuman->isi !!}
                </p>
            </div>
        </div>
        <div class="grid-cols-1 bg-white rounded">
            <div class="bg-blue-300 dark:bg-gray-800 p-2.5 rounded-t dark:border-b dark:border-b-gray-400">
                <h3 class="font-bold dark:text-gray-300">
                    Keterangan :
                </h3>
            </div>
            <div class="p-2.5 dark:bg-gray-800">
                <table class="w-full">
                    <tbody class="flex flex-col gap-2">
                        @foreach ($kehadiran as $data)
                            <tr
                                class="flex items-center gap-4 p-2 border-b dark:border-b-gray-400 last:border-b-0 dark:text-gray-400">
                                <td>
                                    <div style="width:30px;height:30px;background:#{{ $data->color }}"></div>
                                </td>
                                <td>:</td>
                                <td class="font-light">{{ $data->ket }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            setInterval(function() {
                var date = new Date();
                var hari = date.getDay();
                var h = date.getHours();
                var m = date.getMinutes();
                h = (h < 10) ? "0" + h : h;
                m = (m < 10) ? "0" + m : m;
                var jam = h + ":" + m;

                if (hari == '0' || hari == '6') {
                    $("#data-jadwal").html(
                        `<tr>
                <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Sekalah Libur!</td>
              </tr>`
                    );
                } else {
                    if (jam <= '07:00') {
                        $("#data-jadwal").html(
                            `<tr>
                  <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Jam Pelajaran Hari ini Akan Segera Dimulai!</td>
                </tr>`
                        );
                    } else if (
                        hari == '1' && jam >= '16:15' ||
                        hari == '2' && jam >= '16:00' ||
                        hari == '3' && jam >= '16:00' ||
                        hari == '4' && jam >= '16:00' ||
                        hari == '5' && jam >= '15:40'
                    ) {
                        $("#data-jadwal").html(
                            `<tr>
                  <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Jam Pelajaran Hari ini Sudah Selesai!</td>
                </tr>`
                        );
                    } else {
                        if (
                            hari == '1' && jam >= '09:45' && jam <= '10:15' ||
                            hari == '1' && jam >= '12:30' && jam <= '13:15' ||
                            hari == '2' && jam >= '09:15' && jam <= '09:45' ||
                            hari == '2' && jam >= '12:00' && jam <= '13:00' ||
                            hari == '3' && jam >= '09:15' && jam <= '09:45' ||
                            hari == '3' && jam >= '12:00' && jam <= '13:00' ||
                            hari == '4' && jam >= '09:15' && jam <= '09:45' ||
                            hari == '4' && jam >= '12:00' && jam <= '13:00' ||
                            hari == '5' && jam >= '09:00' && jam <= '09:15' ||
                            hari == '5' && jam >= '11:15' && jam <= '13:00'
                        ) {
                            $("#data-jadwal").html(
                                `<tr>
                    <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Waktunya Istirahat!</td>
                  </tr>`
                            );
                        } else if (hari == '1' && jam >= '07:00' && jam <= '07:30') {
                            $("#data-jadwal").html(
                                `<tr>
                    <td colspan='5' style='background:#fff;text-align:center;font-weight:bold;font-size:18px;'>Waktunya Upacara Bendera!</td>
                  </tr>`
                            );
                        } else {
                            $.ajax({
                                type: "GET",
                                data: {
                                    hari: hari,
                                    jam: jam
                                },
                                dataType: "JSON",
                                url: "{{ url('/jadwal/sekarang') }}",
                                success: function(data) {
                                    var html = "";
                                    $.each(data, function(index, val) {
                                        html += "<tr>";
                                        html += "<td>" + val.jam_mulai + ' - ' + val
                                            .jam_selesai + "</td>";
                                        html += "<td><h5 class='card-title'>" + val
                                            .mapel +
                                            "</h5><p class='card-text'><small class='text-muted'>" +
                                            val.guru + "</small></p></td>";
                                        html += "<td>" + val.kelas + "</td>";
                                        html += "<td>" + val.ruang + "</td>";
                                        if (val.ket != null) {
                                            html +=
                                                "<td><div style='margin-left:20px;width:30px;height:30px;background:#" +
                                                val.ket + "'></div></td>";
                                        } else {
                                            html += "<td></td>";
                                        }
                                        html += "</tr>";
                                    });
                                    $("#data-jadwal").html(html);
                                },
                                error: function() {}
                            });
                        }
                    }
                }
            }, 60 * 1000);
        });

        $("#Dashboard").addClass("active");
        $("#liDashboard").addClass("menu-open");
        $("#Home").addClass("active");
    </script>
@endsection
