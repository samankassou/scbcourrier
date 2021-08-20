@switch($status)
    @case('assigned')
        <span
            class="px-2 py-1 font-semibold leading-tight text-indigo-700 bg-indigo-100 rounded-full dark:text-white dark:bg-indigo-600">
            @lang($status)
        </span>
    @break
    @case('pending')
        <span
            class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
            @lang($status)
        </span>
    @break
    @case('processed')
        <span
            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:text-white dark:bg-green-600">
            @lang($status)
        </span>
    @break
    @case('rejected')
        <span
            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
            @lang($status)
        </span>
    @break

    @default
        <span
            class="px-2 py-1 font-semibold leading-tight text-teal-700 bg-teal-100 rounded-full dark:bg-teal-700 dark:text-teal-100">
            @lang($status)
        </span>
@endswitch
