@switch($status)
    @case("reçu")
        <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
            {{ $status }}
        </span>
        @break
    @case("rejeté")
        <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
            {{ $status }}
        </span>
        @break

    @default
        <span
            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
            {{ $status }}
        </span>
@endswitch
