@props([
    'title' => 'Tidak Ada Data Jadwal!',
    'subtitle' => 'Jadwal belum tersedia',
    'iconColor' => 'from-gray-100 to-gray-200',
    'iconDark' => 'dark:from-gray-700 dark:to-gray-600',
    'svgColor' => 'text-gray-600 dark:text-gray-400'
])

<tr>
    <td colspan="5" class="py-8 text-center">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-gradient-to-br {{ $iconColor }} {{ $iconDark }} rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 {{ $svgColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-.966-5.5-2.5M12 7c.828 0 1.5-.672 1.5-1.5S12.828 4 12 4s-1.5.672-1.5 1.5S11.172 7 12 7z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $title }}</h3>
            <p class="text-gray-600 dark:text-gray-400">{{ $subtitle }}</p>
        </div>
    </td>
</tr>
