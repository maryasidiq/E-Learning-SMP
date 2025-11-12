<aside :class="sidebarToggle ? 'translate-x-0 lg:w-[90px]' : '-translate-x-full'"
    class="sidebar fixed left-0 top-0 z-9999 flex h-screen w-[290px] flex-col overflow-y-hidden border-r border-gray-200 bg-white px-5 dark:border-gray-800 dark:bg-black lg:static lg:translate-x-0">
    <!-- SIDEBAR HEADER -->
    <div :class="sidebarToggle ? 'justify-center' : 'justify-between'"
        class="flex items-center gap-2 pt-8 sidebar-header pb-7">
        <a href="{{ url()->current() }}">
            <span class="logo" :class="sidebarToggle ? 'hidden' : ''">
                <img class="mt-16 lg:mt-0" src="{{ asset('img/logo1.png') }}" alt="Large Logo" style="height: 150px;" />


                {{-- <img class="hidden dark:block" src="{{ asset('img/logo2.png') }}" alt="Logo" /> --}}
            </span>

            <img class="logo-icon" :class="sidebarToggle ? 'lg:block mt-16 lg:mt-0' : 'hidden'"
                src="{{ asset('img/logo2.png') }}" alt="Small Logo" />
        </a>
    </div>
    <!-- SIDEBAR HEADER -->

    <div class="flex flex-col overflow-y-auto duration-300 ease-linear no-scrollbar">
        <!-- Sidebar Menu -->
        <nav x-data="{ selected: $persist('Dashboard') }">
            <!-- Menu Group -->
            <div>
                <h3 class="mb-4 text-xs uppercase leading-[20px] text-gray-400">
                    <span class="menu-group-title" :class="sidebarToggle ? 'lg:hidden' : ''">
                        MENU
                    </span>

                    <svg :class="sidebarToggle ? 'lg:block hidden' : 'hidden'"
                        class="mx-auto fill-current menu-group-icon" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M5.99915 10.2451C6.96564 10.2451 7.74915 11.0286 7.74915 11.9951V12.0051C7.74915 12.9716 6.96564 13.7551 5.99915 13.7551C5.03265 13.7551 4.24915 12.9716 4.24915 12.0051V11.9951C4.24915 11.0286 5.03265 10.2451 5.99915 10.2451ZM17.9991 10.2451C18.9656 10.2451 19.7491 11.0286 19.7491 11.9951V12.0051C19.7491 12.9716 18.9656 13.7551 17.9991 13.7551C17.0326 13.7551 16.2491 12.9716 16.2491 12.0051V11.9951C16.2491 11.0286 17.0326 10.2451 17.9991 10.2451ZM13.7491 11.9951C13.7491 11.0286 12.9656 10.2451 11.9991 10.2451C11.0326 10.2451 10.2491 11.0286 10.2491 11.9951V12.0051C10.2491 12.9716 11.0326 13.7551 11.9991 13.7551C12.9656 13.7551 13.7491 12.9716 13.7491 12.0051V11.9951Z"
                            fill="" />
                    </svg>
                </h3>

                @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Operator')
                @elseif (Auth::user()->role == 'Guru' && Auth::user()->guru(Auth::user()->id_card))
                    <ul class="flex flex-col gap-4 mb-6">
                        <!-- Menu Item Dashboard -->
                        <li>
                            <a href="{{ route('home') }}" class="menu-item group menu-dashboard"
                                :class="@json(Route::is('home')) ?
                                                                                                                                                'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="@json(Route::is('home')) ?
                                                                                                                                                'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                        fill="" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Dashboard -->

                        <!-- Menu Item Absen -->
                        <!-- <li>
                            <a href="{{ route('absen.harian') }}" class="menu-item group"
                                :class="@json(Route::is('absen.harian')) ?
                                                                                                                                                'menu-item-active' : 'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('absen.harian')) ?
                                                                                                                                                    '!stroke-brand-400 !dark:stroke-brand-500' :
                                                                                                                                                    'stroke-gray-500 dark:stroke-gray-400'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-calendar-check-icon lucide-calendar-check">
                                    <path d="M8 2v4" />
                                    <path d="M16 2v4" />
                                    <rect width="18" height="18" x="3" y="4" rx="2" />
                                    <path d="M3 10h18" />
                                    <path d="m9 16 2 2 4-4" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Absensi Guru
                                </span>
                            </a>
                        </li> -->
                        <!-- Menu Item Absen -->

                        <!-- Menu Item Jadwal -->
                        <li>
                            <a href="{{ route('jadwal.guru') }}" class="menu-item group"
                                :class="@json(Route::is('jadwal.guru')) ?
                                                                                                                                                'menu-item-active' : 'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('jadwal.guru')) ?
                                                                                                                                                    '!stroke-brand-400 !dark:stroke-brand-500' :
                                                                                                                                                    'stroke-gray-500 dark:stroke-gray-400'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-calendar-days-icon lucide-calendar-days">
                                    <path d="M8 2v4" />
                                    <path d="M16 2v4" />
                                    <rect width="18" height="18" x="3" y="4" rx="2" />
                                    <path d="M3 10h18" />
                                    <path d="M8 14h.01" />
                                    <path d="M12 14h.01" />
                                    <path d="M16 14h.01" />
                                    <path d="M8 18h.01" />
                                    <path d="M12 18h.01" />
                                    <path d="M16 18h.01" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Jadwal Mengajar
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Jadwal -->

                        <!-- Menu Item Materi Mapel -->
                        <li>
                            <a href="{{ route('materi.index') }}" class="menu-item group"
                                :class="@json(Route::is('materi.index')) || @json(Route::is('materi.create')) ||
                                                                                                                                                @json(Route::is('materi.show')) || @json(Route::is('materi.edit')) ?
                                                                                                                                                'menu-item-active' : 'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('materi.index')) || @json(Route::is('materi.create')) ||
                                                                                                                                                    @json(Route::is('materi.show')) || @json(Route::is('materi.edit')) ?
                                                                                                                                                    '!stroke-brand-400 !dark:stroke-brand-500' :
                                                                                                                                                    'stroke-gray-500 dark:stroke-gray-400'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-book-open-icon lucide-book-open">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Materi Mapel
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Materi Mapel -->

                        <!-- Menu Item Soal -->
                        <li>
                            <a href="{{ route('soal.index') }}" class="menu-item group"
                                :class="@json(Route::is('soal.index')) || @json(Route::is('soal.create')) ||
                                                                                                                                                @json(Route::is('soal.show')) || @json(Route::is('soal.edit')) ||
                                                                                                                                                @json(Route::is('soal.create-soal')) || @json(Route::is('soal.edit-soal')) ?
                                                                                                                                                'menu-item-active' : 'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('soal.index')) || @json(Route::is('soal.create')) ||
                                                                                                                                                    @json(Route::is('soal.show')) || @json(Route::is('soal.edit')) ||
                                                                                                                                                    @json(Route::is('soal.create-soal')) || @json(Route::is('soal.edit-soal')) ?
                                                                                                                                                    '!stroke-brand-400 !dark:stroke-brand-500' :
                                                                                                                                                    'stroke-gray-500 dark:stroke-gray-400'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-file-question-icon lucide-file-question">
                                    <path d="M12 17h.01" />
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z" />
                                    <path d="M9.1 9a3 3 0 0 1 5.82 1c0 1-3 2-3 2" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Soal
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Soal -->

                        <!-- Menu Item Nilai -->
                        <li>
                            <a href="{{ route('guru.nilai.mapel') }}" class="menu-item group"
                                :class="@json(Route::is('nilai.index')) || @json(Route::is('guru.nilai.mapel')) ||
                                                                                                                                                    @json(Route::is('nilai.show')) ?
                                                                                                                                                    'menu-item-active' :
                                                                                                                                                    'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('nilai.index')) || @json(Route::is('guru.nilai.mapel')) ||
                                                                                                                                                    @json(Route::is('nilai.show')) ?
                                                                                                                                                    '!stroke-brand-400 !dark:stroke-brand-500' :
                                                                                                                                                    'stroke-gray-500 dark:stroke-gray-400'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                    <path d="M10 9H8" />
                                    <path d="M16 13H8" />
                                    <path d="M16 17H8" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Nilai
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Nilai -->
                    </ul>
                @elseif (Auth::user()->role == 'Siswa' && Auth::user()->siswa(Auth::user()->no_induk))
                    <ul class="flex flex-col gap-4 mb-6">
                        <!-- Menu Item Dashboard -->
                        <li>
                            <a href="{{ route('home') }}" class="menu-item group menu-dashboard"
                                :class="@json(Route::is('home')) ?
                                                                                                                                            'menu-item-active' : 'menu-item-inactive'">
                                <svg :class="@json(Route::is('home')) ?
                                                                                                                                            'menu-item-icon-active' : 'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M5.5 3.25C4.25736 3.25 3.25 4.25736 3.25 5.5V8.99998C3.25 10.2426 4.25736 11.25 5.5 11.25H9C10.2426 11.25 11.25 10.2426 11.25 8.99998V5.5C11.25 4.25736 10.2426 3.25 9 3.25H5.5ZM4.75 5.5C4.75 5.08579 5.08579 4.75 5.5 4.75H9C9.41421 4.75 9.75 5.08579 9.75 5.5V8.99998C9.75 9.41419 9.41421 9.74998 9 9.74998H5.5C5.08579 9.74998 4.75 9.41419 4.75 8.99998V5.5ZM5.5 12.75C4.25736 12.75 3.25 13.7574 3.25 15V18.5C3.25 19.7426 4.25736 20.75 5.5 20.75H9C10.2426 20.75 11.25 19.7427 11.25 18.5V15C11.25 13.7574 10.2426 12.75 9 12.75H5.5ZM4.75 15C4.75 14.5858 5.08579 14.25 5.5 14.25H9C9.41421 14.25 9.75 14.5858 9.75 15V18.5C9.75 18.9142 9.41421 19.25 9 19.25H5.5C5.08579 19.25 4.75 18.9142 4.75 18.5V15ZM12.75 5.5C12.75 4.25736 13.7574 3.25 15 3.25H18.5C19.7426 3.25 20.75 4.25736 20.75 5.5V8.99998C20.75 10.2426 19.7426 11.25 18.5 11.25H15C13.7574 11.25 12.75 10.2426 12.75 8.99998V5.5ZM15 4.75C14.5858 4.75 14.25 5.08579 14.25 5.5V8.99998C14.25 9.41419 14.5858 9.74998 15 9.74998H18.5C18.9142 9.74998 19.25 9.41419 19.25 8.99998V5.5C19.25 5.08579 18.9142 4.75 18.5 4.75H15ZM15 12.75C13.7574 12.75 12.75 13.7574 12.75 15V18.5C12.75 19.7426 13.7574 20.75 15 20.75H18.5C19.7426 20.75 20.75 19.7427 20.75 18.5V15C20.75 13.7574 19.7426 12.75 18.5 12.75H15ZM14.25 15C14.25 14.5858 14.5858 14.25 15 14.25H18.5C18.9142 14.25 19.25 14.5858 19.25 15V18.5C19.25 18.9142 18.9142 19.25 18.5 19.25H15C14.5858 19.25 14.25 18.9142 14.25 18.5V15Z"
                                        fill="" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Dashboard
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Dashboard -->

                        <!-- Menu Item Jadwal -->
                        <li>
                            <a href="{{ route('jadwal.siswa') }}" class="menu-item group"
                                 :class="@json(Route::is('jadwal.siswa')) ? 'menu-item-active' :
                                                                                                                              'menu-item-inactive'">
                     <svg :class="@json(Route::is('jadwal.siswa')) ? 'menu-item-icon-active' :
                                                                                                                            'menu-item-icon-inactive'"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M8 2C8.41421 2 8.75 2.33579 8.75 2.75V3.75H15.25V2.75C15.25 2.33579 15.5858 2 16 2C16.4142 2 16.75 2.33579 16.75 2.75V3.75H18.5C19.7426 3.75 20.75 4.75736 20.75 6V9V19C20.75 20.2426 19.7426 21.25 18.5 21.25H5.5C4.25736 21.25 3.25 20.2426 3.25 19V9V6C3.25 4.75736 4.25736 3.75 5.5 3.75H7.25V2.75C7.25 2.33579 7.58579 2 8 2ZM8 5.25H5.5C5.08579 5.25 4.75 5.58579 4.75 6V8.25H19.25V6C19.25 5.58579 18.9142 5.25 18.5 5.25H16H8ZM19.25 9.75H4.75V19C4.75 19.4142 5.08579 19.75 5.5 19.75H18.5C18.9142 19.75 19.25 19.4142 19.25 19V9.75Z"
                                        fill="" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Jadwal
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Jadwal -->


                        <!-- Menu Item Materi -->
                        <li>
                            <a href="{{ route('materi.siswa') }}" class="menu-item group"
                                :class="@json(Route::is('materi.siswa')) || @json(Route::is('materi.siswa.show')) ? 'menu-item-active' :
                                                                                                                                        'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('materi.siswa')) || @json(Route::is('materi.siswa.show')) ?
                                                                                                                                            'menu-item-icon-inactive'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                    <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                    <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Materi Pembelajaran
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Materi -->

                        <!-- Menu Item Soal -->
                        <li>
                            <a href="{{ route('soal.siswa') }}" class="menu-item group"
                                :class="@json(Route::is('soal.siswa')) || @json(Route::is('soal.siswa.show')) || @json(Route::is('soal.siswa.kerjakan')) ? 'menu-item-active' :
                                                                                                                                    'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('soal.siswa')) || @json(Route::is('soal.siswa.show')) || @json(Route::is('soal.siswa.kerjakan')) ?
                                                                                                                                    'stroke-blue-500 dark:stroke-blue-400' :
                                                                                                                                    'stroke-gray-500 dark:stroke-gray-400'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-file-question-icon lucide-file-question">
                                    <path d="M12 17h.01" />
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7z" />
                                    <path d="M9.1 9a3 3 0 0 1 5.82 1c0 1-3 2-3 2" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Soal
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Soal -->

                        <!-- Menu Item Nilai -->
                        <li>
                            <a href="{{ route('nilai.siswa') }}" class="menu-item group"
                                :class="@json(Route::is('nilai.siswa')) ?
                                                                                                                                    'menu-item-active' :
                                                                                                                                    'menu-item-inactive'">
                                <svg class="fill-none"
                                    :class="@json(Route::is('nilai.siswa')) ?
                                                                                                                                    'stroke-pink-500 dark:stroke-pink-400' :
                                                                                                                                    'stroke-gray-500 dark:stroke-gray-400'"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-file-text-icon lucide-file-text">
                                    <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                    <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                    <path d="M10 9H8" />
                                    <path d="M16 13H8" />
                                    <path d="M16 17H8" />
                                </svg>

                                <span class="menu-item-text" :class="sidebarToggle ? 'lg:hidden' : ''">
                                    Nilai
                                </span>
                            </a>
                        </li>
                        <!-- Menu Item Nilai -->
                    </ul>
                @endif
            </div>
            <!-- Sidebar Menu -->
        </nav>
    </div>
</aside>