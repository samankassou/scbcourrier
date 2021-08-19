<li class="relative px-6 py-3">
    @if (request()->routeIs($route))
        <span class="absolute inset-y-0 left-0 w-1 bg-yellow-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>
    @endif
    <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 {{ request()->routeIs($route) ? 'text-gray-800 dark:text-gray-200' : '' }} hover:text-gray-800 dark:hover:text-gray-200"
        href="{{ route($route) }}">
        {{ $slot }}
        <span class="ml-4">@lang($text)</span>
    </a>
</li>
