@extends('layouts.app2')
@section('pageTitle', 'Dashboard')
@section('title', 'Dashboard')

@section('content')
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="bg-gradient-to-br from-red-600 via-rose-700 to-pink-800 dark:from-red-800 dark:via-rose-900 dark:to-pink-900 rounded-2xl p-8 mb-8 text-white shadow-2xl relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-br from-white/10 to-transparent"></div>
            <div class="relative z-10 flex items-center justify-between">
                <div class="animate-fade-in">
                    <h1 class="text-4xl font-extrabold mb-3 bg-gradient-to-r from-white to-red-100 bg-clip-text text-transparent">ELSDUMI</h1>
                    <p class="text-red-100 text-xl font-medium">Selamat datang di sistem E-Learning SMP Negeri 2 Mlati</p>
                    <div class="mt-4 flex items-center space-x-4">
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span class="text-sm font-medium">{{ date('l, d M Y') }}</span>
                        </div>
                        <div class="flex items-center bg-white/20 rounded-full px-4 py-2 backdrop-blur-sm">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-sm font-medium" id="current-time">{{ date('H:i:s') }}</span>
                        </div>
                    </div>
                </div>
                <div class="hidden md:block animate-bounce-slow">
                    <div class="relative">
                        <svg class="w-20 h-20 text-white/80 drop-shadow-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                        </svg>
                        <div class="absolute -top-2 -right-2 w-6 h-6 bg-yellow-400 rounded-full flex items-center justify-center">
                            <svg class="w-3 h-3 text-yellow-800" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 mb-6 sm:mb-8">
            <!-- Current Schedule Card -->
            <!-- Current Schedule Card (Responsive Enhanced) -->
<div class="lg:col-span-2 order-2 lg:order-1">
    <div class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-4 sm:p-6 lg:p-8 shadow-xl hover:shadow-2xl transition-all duration-500">
        
        <!-- Header -->
        <div class="flex items-center mb-5 flex-wrap gap-2">
            <div class="w-10 h-10 sm:w-12 sm:h-12 bg-gradient-to-br from-red-100 to-rose-100 dark:from-red-900/30 dark:to-rose-900/30 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <div class="flex-1 min-w-[200px]">
                <h2 class="text-lg sm:text-xl lg:text-2xl font-bold text-gray-900 dark:text-white">Jadwal Sekarang</h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">Lihat jadwal pelajaran hari ini</p>
            </div>
        </div>

        <!-- Table Wrapper -->
        <div class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800/30">
            <div class="w-full overflow-x-auto scrollbar-thin scrollbar-thumb-gray-300 dark:scrollbar-thumb-gray-600 scrollbar-track-transparent">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-100/50 dark:bg-gray-700/30">
                        <tr class="border-b border-gray-200 dark:border-gray-700">
                            <th class="px-3 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold whitespace-nowrap">Jam</th>
                            <th class="px-3 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold">Mapel</th>
                            <th class="px-3 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold hidden sm:table-cell">Kelas</th>
                            <th class="px-3 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold hidden md:table-cell">Ruang</th>
                            <th class="px-3 py-2 text-left text-gray-700 dark:text-gray-300 font-semibold whitespace-nowrap">Status</th>
                        </tr>
                    </thead>

                    <tbody id="data-jadwal" class="divide-y divide-gray-200 dark:divide-gray-700">
                        {{-- ====== LOGIKA WAKTU & JADWAL ====== --}}
                        @php
                            $hari = date('w');
                            $jam = date('H:i');
                        @endphp

                        @if ($jadwal->count() > 0)
                            {{-- === ISTIRAHAT === --}}
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
                                ($hari == '5' && $jam >= '11:15' && $jam <= '13:00')
                            )
                                @include('components.jadwal-card', [
                                    'iconColor' => 'from-orange-100 to-yellow-100',
                                    'iconDark' => 'dark:from-orange-900/30 dark:to-yellow-900/30',
                                    'svgColor' => 'text-orange-600 dark:text-orange-400',
                                    'title' => 'Waktunya Istirahat!',
                                    'subtitle' => 'Nikmati waktu istirahat Anda',
                                ])
                            @else
                                {{-- === DAFTAR JADWAL === --}}
                                @foreach ($jadwal as $data)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700/30 transition-colors">
                                        <td class="px-3 py-3">
                                            <div class="flex items-center gap-2">
                                                <img src="{{ $data->guru->foto }}" alt="guru"
                                                    class="w-8 h-8 rounded-full object-cover flex-shrink-0" />
                                                <span class="font-medium text-gray-900 dark:text-white text-sm block truncate">
                                                    {{ $data->jam_mulai . ' - ' . $data->jam_selesai }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-3 py-3">
                                            <span class="font-medium text-gray-900 dark:text-white text-sm block truncate">
                                                {{ $data->mapel->nama_mapel }}
                                            </span>
                                            <small class="text-gray-500 dark:text-gray-400 text-xs">{{ $data->guru->nama_guru }}</small>
                                        </td>
                                        <td class="px-3 py-3 hidden sm:table-cell">
                                            <span class="text-gray-900 dark:text-white text-sm truncate block">{{ $data->kelas->nama_kelas }}</span>
                                        </td>
                                        <td class="px-3 py-3 hidden md:table-cell">
                                            <span class="text-gray-900 dark:text-white text-sm truncate block">{{ $data->ruang->nama_ruang }}</span>
                                        </td>
                                        <td class="px-3 py-3">
                                            <div class="flex items-center">
                                                @if ($data->absen($data->guru_id))
                                                    <div class="w-4 h-4 rounded-full" style="background-color:#{{ $data->absen($data->guru_id) }}"></div>
                                                @elseif (date('H:i:s') >= '09:00:00')
                                                    <div class="w-4 h-4 bg-red-500 rounded-full"></div>
                                                @else
                                                    <div class="w-4 h-4 bg-gray-300 rounded-full"></div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @else
                            {{-- === DATA KOSONG / LIBUR === --}}
                            @include('components.jadwal-empty', [
                                'title' => 'Tidak Ada Data Jadwal!',
                                'subtitle' => 'Jadwal belum tersedia',
                                'iconColor' => 'from-gray-100 to-gray-200',
                                'iconDark' => 'dark:from-gray-700 dark:to-gray-600',
                                'svgColor' => 'text-gray-600 dark:text-gray-400'
                            ])
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

            <!-- Sidebar -->
            <div class="order-1 lg:order-2">
                <div class="space-y-3 sm:space-y-4 lg:space-y-6">
                    <!-- Pengumuman Card -->
                    <div class="bg-white dark:bg-gray-800/50 backdrop-blur-sm rounded-xl sm:rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-3 sm:p-4 lg:p-6 shadow-xl hover:shadow-2xl transition-all duration-500">
                        <div class="flex items-center mb-2 sm:mb-3 lg:mb-4">
                            <div class="w-7 h-7 sm:w-8 sm:h-8 lg:w-10 lg:h-10 bg-gradient-to-br from-yellow-100 to-amber-100 dark:from-yellow-900/30 dark:to-amber-900/30 rounded-lg sm:rounded-xl flex items-center justify-center mr-2 sm:mr-3 flex-shrink-0">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 lg:w-5 lg:h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <div class="min-w-0 flex-1">
                                <h3 class="text-sm sm:text-base lg:text-lg font-bold text-gray-900 dark:text-white truncate">Pengumuman</h3>
                                <p class="text-xs text-gray-500 dark:text-gray-400 lg:hidden">Informasi terbaru sekolah</p>
                            </div>
                        </div>
                        <div class="prose prose-xs sm:prose-sm dark:prose-invert max-w-none dark:text-white">
                            {!! $pengumuman->isi !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Update current time
            setInterval(function() {
                var now = new Date();
                var timeString = now.toLocaleTimeString('id-ID', {
                    hour12: false,
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit'
                });
                $('#current-time').text(timeString);
            }, 1000);

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
                            <td colspan='5' class='py-8 text-center'>
                                <div class='flex flex-col items-center'>
                                    <div class='w-16 h-16 bg-gradient-to-br from-purple-100 to-pink-100 dark:from-purple-900/30 dark:to-pink-900/30 rounded-full flex items-center justify-center mb-4'>
                                        <svg class='w-8 h-8 text-purple-600 dark:text-purple-400' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                            <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z'></path>
                                        </svg>
                                    </div>
                                    <h3 class='text-xl font-bold text-gray-900 dark:text-white mb-2'>Sekolah Libur!</h3>
                                    <p class='text-gray-600 dark:text-gray-400'>Nikmati hari libur Anda</p>
                                </div>
                            </td>
                        </tr>`
                    );
                } else {
                    if (jam <= '07:00') {
                        $("#data-jadwal").html(
                            `<tr>
                                <td colspan='5' class='py-8 text-center'>
                                    <div class='flex flex-col items-center'>
                                        <div class='w-16 h-16 bg-gradient-to-br from-blue-100 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30 rounded-full flex items-center justify-center mb-4'>
                                            <svg class='w-8 h-8 text-blue-600 dark:text-blue-400' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z'></path>
                                            </svg>
                                        </div>
                                        <h3 class='text-xl font-bold text-gray-900 dark:text-white mb-2'>Jam Pelajaran Akan Segera Dimulai!</h3>
                                        <p class='text-gray-600 dark:text-gray-400'>Persiapkan diri untuk belajar</p>
                                    </div>
                                </td>
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
                                <td colspan='5' class='py-8 text-center'>
                                    <div class='flex flex-col items-center'>
                                        <div class='w-16 h-16 bg-gradient-to-br from-green-100 to-emerald-100 dark:from-green-900/30 dark:to-emerald-900/30 rounded-full flex items-center justify-center mb-4'>
                                            <svg class='w-8 h-8 text-green-600 dark:text-green-400' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                                <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                                            </svg>
                                        </div>
                                        <h3 class='text-xl font-bold text-gray-900 dark:text-white mb-2'>Jam Pelajaran Sudah Selesai!</h3>
                                        <p class='text-gray-600 dark:text-gray-400'>Selamat beristirahat</p>
                                    </div>
                                </td>
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
                                    <td colspan='5' class='py-8 text-center'>
                                        <div class='flex flex-col items-center'>
                                            <div class='w-16 h-16 bg-gradient-to-br from-orange-100 to-yellow-100 dark:from-orange-900/30 dark:to-yellow-900/30 rounded-full flex items-center justify-center mb-4'>
                                                <svg class='w-8 h-8 text-orange-600 dark:text-orange-400' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'></path>
                                                </svg>
                                            </div>
                                            <h3 class='text-xl font-bold text-gray-900 dark:text-white mb-2'>Waktunya Istirahat!</h3>
                                            <p class='text-gray-600 dark:text-gray-400'>Nikmati waktu istirahat Anda</p>
                                        </div>
                                    </td>
                                </tr>`
                            );
                        } else if (hari == '1' && jam >= '07:00' && jam <= '07:30') {
                            $("#data-jadwal").html(
                                `<tr>
                                    <td colspan='5' class='py-8 text-center'>
                                        <div class='flex flex-col items-center'>
                                            <div class='w-16 h-16 bg-gradient-to-br from-red-100 to-orange-100 dark:from-red-900/30 dark:to-orange-900/30 rounded-full flex items-center justify-center mb-4'>
                                                <svg class='w-8 h-8 text-red-600 dark:text-red-400' fill='none' stroke='currentColor' viewBox='0 0 24 24'>
                                                    <path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M3 21v-4a4 4 0 014-4h.582l.723-1.447A4 4 0 0114.29 9h.582a4 4 0 014 4v4M6 9V3a2 2 0 012-2h8a2 2 0 012 2v6'></path>
                                                </svg>
                                            </div>
                                            <h3 class='text-xl font-bold text-gray-900 dark:text-white mb-2'>Waktunya Upacara Bendera!</h3>
                                            <p class='text-gray-600 dark:text-gray-400'>Mari kita hormati bendera merah putih</p>
                                        </div>
                                    </td>
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
                                        html += "<tr class='hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors'>";
                                        html += "<td class='px-2 sm:px-3 lg:px-5 py-3 sm:py-4'>";
                                        html += "<div class='flex items-center'>";
                                        html += "<div class='w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10 overflow-hidden rounded-full mr-1.5 sm:mr-2 lg:mr-3 flex-shrink-0'>";
                                        html += "<img src='" + val.foto + "' alt='guru' class='w-full h-full object-cover' />";
                                        html += "</div>";
                                        html += "<div class='min-w-0'>";
                                        html += "<span class='font-medium text-gray-900 dark:text-white text-xs sm:text-sm block truncate'>" + val.jam_mulai + ' - ' + val.jam_selesai + "</span>";
                                        html += "</div>";
                                        html += "</div>";
                                        html += "</td>";
                                        html += "<td class='px-2 sm:px-3 lg:px-5 py-3 sm:py-4'>";
                                        html += "<div class='min-w-0'>";
                                        html += "<span class='font-medium text-gray-900 dark:text-white text-xs sm:text-sm block truncate'>" + val.mapel + "</span>";
                                        html += "<small class='text-gray-500 dark:text-gray-400 text-xs block truncate'>" + val.guru + "</small>";
                                        html += "</div>";
                                        html += "</td>";
                                        html += "<td class='px-2 sm:px-3 lg:px-5 py-3 sm:py-4 hidden sm:table-cell'>";
                                        html += "<span class='text-gray-900 dark:text-white text-xs sm:text-sm truncate block'>" + val.kelas + "</span>";
                                        html += "</td>";
                                        html += "<td class='px-2 sm:px-3 lg:px-5 py-3 sm:py-4 hidden md:table-cell'>";
                                        html += "<span class='text-gray-900 dark:text-white text-xs sm:text-sm truncate block'>" + val.ruang + "</span>";
                                        html += "</td>";
                                        if (val.ket != null) {
                                            html += "<td class='px-2 sm:px-3 lg:px-5 py-3 sm:py-4'><div class='flex items-center'><div class='w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 rounded-full flex-shrink-0' style='background-color:#" + val.ket + "'></div></div></td>";
                                        } else {
                                            html += "<td class='px-2 sm:px-3 lg:px-5 py-3 sm:py-4'><div class='flex items-center'><div class='w-4 h-4 sm:w-5 sm:h-5 lg:w-6 lg:h-6 bg-gray-300 rounded-full flex-shrink-0'></div></div></td>";
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
