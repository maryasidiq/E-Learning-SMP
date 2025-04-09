@extends('layouts.app2')
@section('content')
    <h1 class="text-2xl mb-4 dark:text-gray-300">Jadwal Kelas Sekarang</h1>
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="max-w-full overflow-x-auto">
            <table class="min-w-full">
                <!-- table header start -->
                <thead>
                    <tr class="border-b border-graay-100 dark:border-gray-800">
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Jam Pelajaran
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Mata Pelajaran
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Kelas
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Ruang Kelas
                                </p>
                            </div>
                        </th>
                        <th class="px-5 py-3 sm:px-6">
                            <div class="flex items-center">
                                <p class="font-medium text-gray-500 text-theme-xs dark:text-gray-400">
                                    Ket.
                                </p>
                            </div>
                        </th>
                    </tr>
                </thead>
                <!-- table header end -->
                <!-- table body start -->
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800">
                    <tr>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 overflow-hidden rounded-full">
                                        <img src="./images/user/user-17.jpg" alt="brand" />
                                    </div>

                                    <div>
                                        <span class="block font-medium text-gray-800 text-theme-sm dark:text-white/90">
                                            Lindsey Curtis
                                        </span>
                                        <span class="block text-gray-500 text-theme-xs dark:text-gray-400">
                                            Web Designer
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">
                                    Agency Website
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <div class="flex -space-x-2">
                                    <div
                                        class="w-6 h-6 overflow-hidden border-2 border-white rounded-full dark:border-gray-900">
                                        <img src="./images/user/user-22.jpg" alt="user" />
                                    </div>
                                    <div
                                        class="w-6 h-6 overflow-hidden border-2 border-white rounded-full dark:border-gray-900">
                                        <img src="./images/user/user-23.jpg" alt="user" />
                                    </div>
                                    <div
                                        class="w-6 h-6 overflow-hidden border-2 border-white rounded-full dark:border-gray-900">
                                        <img src="./images/user/user-24.jpg" alt="user" />
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p
                                    class="rounded-full bg-success-50 px-2 py-0.5 text-theme-xs font-medium text-success-700 dark:bg-success-500/15 dark:text-success-500">
                                    Active
                                </p>
                            </div>
                        </td>
                        <td class="px-5 py-4 sm:px-6">
                            <div class="flex items-center">
                                <p class="text-gray-500 text-theme-sm dark:text-gray-400">3.9K</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
