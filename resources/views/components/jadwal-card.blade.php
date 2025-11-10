@props([
    'iconColor' => 'from-blue-100 to-indigo-100',
    'iconDark' => 'dark:from-blue-900/30 dark:to-indigo-900/30',
    'svgColor' => 'text-blue-600 dark:text-blue-400',
    'title' => 'Jadwal',
    'subtitle' => 'Informasi jadwal'
])

<tr>
    <td colspan="5" class="py-8 text-center">
        <div class="flex flex-col items-center">
            <div class="w-16 h-16 bg-gradient-to-br {{ $iconColor }} {{ $iconDark }} rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 {{ $svgColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $title }}</h3>
            <p class="text-gray-600 dark:text-gray-400">{{ $subtitle }}</p>
        </div>
    </td>
</tr>
