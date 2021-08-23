@section('title', __('Dashboard'))
    <h2 class="mb-6 text-xl font-semibold text-gray-500 dark:text-gray-200">Statistiques globales</h2>
    {{-- Cards --}}
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers traités
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalProcessedCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers en cours
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalPendingCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers rejetés
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalRejectedCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Nouveaux Courriers
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalNewCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers attribués
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalAssignedCouriers }}
                </p>
            </div>
        </div>
    </div>
    <div style="height: 300px" id="daily"></div>
    <h2 class="mb-6 text-xl font-semibold text-gray-500 dark:text-gray-200">Statistiques journalières</h2>
    {{-- Cards --}}
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers traités
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalProcessedCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers en cours
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalPendingCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers rejetés
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalRejectedCouriers }}
                </p>
            </div>
        </div>
    </div>

    <h2 class="mb-6 text-xl font-semibold text-gray-500 dark:text-gray-200">Statistiques hebdomadaires</h2>
    {{-- Cards --}}
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers traités
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalProcessedCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers en cours
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalPendingCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers rejetés
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalRejectedCouriers }}
                </p>
            </div>
        </div>
    </div>

    <h2 class="mb-6 text-xl font-semibold text-gray-500 dark:text-gray-200">Statistiques mensuelles</h2>
    {{-- Cards --}}
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers traités
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalProcessedCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers en cours
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalPendingCouriers }}
                </p>
            </div>
        </div>
        {{-- Card --}}
        <div class="flex items-center p-4 bg-white rounded-lg shadow-sm dark:bg-gray-800">
            <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                    Courriers rejetés
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{ $totalRejectedCouriers }}
                </p>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{ asset('vendor/chartjs/echarts.min.js') }}"></script>
        <script src="{{ asset('vendor/chartjs/chartisan_echarts.js') }}"></script>
        <script>
            const chart = new Chartisan({
                el: '#daily',
                url: "@chart('daily')",
                hooks: new ChartisanHooks()
                    .datasets(['pie'])
                    .tooltip()
                    .legend({
                        position: 'top'
                    })
                    .colors([
                        'rgb(15, 118, 110)',
                        'rgb(67, 56, 202)',
                        'rgb(194, 65, 12)',
                        'rgb(16, 185, 129)',
                        'rgb(254, 26, 26)'
                    ]),
            });

        </script>
    @endpush
