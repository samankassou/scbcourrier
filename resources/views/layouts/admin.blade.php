@extends('layouts.app')
@section('content')
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- Desktop sidebar -->
        <x-desktop-sidebar />
        <!-- Mobile sidebar -->
        <x-mobile-sidebar />
        <div class="flex flex-col flex-1 w-full">
            <x-header />
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        @lang($title)
                    </h2>
                    @yield('main')
                </div>
            </main>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        Livewire.on('success', (title, message) => {
            iziToast.success({
                title: title,
                message: message,
                position: 'topRight',
            });
        })

    </script>
    @if (session('alert'))
        <script>
            iziToast.success({
                title: "{{ session('alert') }}",
                message: "{{ session('message') }}",
                position: 'topRight',
            })

        </script>
    @endif
@endpush
