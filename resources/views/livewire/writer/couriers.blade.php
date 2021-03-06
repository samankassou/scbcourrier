@section('title', __('Couriers'))
    {{-- New Table --}}
    <div class="w-full overflow-hidden rounded-lg shadow-md">
        <div class="flex justify-between items-center dark:bg-gray-700">
            {{-- Search bar --}}
            <div class="py-4 px-3 pb-0 w-1/3">
                <div class="relative text-left mb-4">
                    <input
                        class="appearance-none w-full bg-white border-gray-300 hover:border-gray-500 px-3 py-2 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-yellow-500 focus:border-2 border"
                        type="text" placeholder="@lang('Search')" autocomplete="off" wire:model="search">
                    @if ($search)
                        <div class="absolute right-0 top-0 mt-3 mr-4 text-purple-lighter">
                            <a wire:click.prevent="$set('search', '')" href="#" class="text-gray-400 hover:text-yellow-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            {{-- create button --}}
            <div class="m-w-12 my-3 mx-2" wire:click="$emit('openModal', 'writer.couriers.create')">
                <button type="button"
                    class="flex justify-center gap-2 items-center w-full px-3 py-1 text-sm font-medium text-white bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:ring-yellow active:bg-yellow-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    @lang("New")
                </button>
            </div>
        </div>
        <div class="flex justify-end items-center dark:bg-gray-700">
            {{-- export button --}}
            <div class="m-w-12 my-3 mx-2" wire:click="export">
                <button type="button"
                    class="flex justify-center gap-2 items-center w-full px-3 py-1 text-sm font-medium text-white bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:ring-yellow active:bg-yellow-700 transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                    @lang("Excel")
                </button>
            </div>
        </div>
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">@lang("Code")</th>
                        <th class="px-4 py-3">@lang("Date")</th>
                        <th class="px-4 py-3">@lang("Sender")</th>
                        <th class="px-4 py-3">@lang("Object")</th>
                        <th class="px-4 py-3">@lang("Assignee")</th>
                        <th class="px-4 py-3">@lang("Status")</th>
                        <th class="px-4 py-3"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @forelse ($couriers as $courier)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $courier->code }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ optional($courier->date)->format('d/m/Y') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $courier->sender }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ substr($courier->object, 0, 20) . '...' }}
                            </td>
                            <td class="px-4 py-3">
                                @if ($courier->recipient)
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold">{{ optional($courier->recipient)->name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ optional($courier->recipient)->email }}
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($courier->status)
                                    <x-courier.status status="{{ $courier->status }}" />
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs flex items-center gap-1">
                                <a href="{{ route('writer.couriers.show', $courier->id) }}" title="@lang('Details')"
                                    class="text-yellow-600 hover:text-yellow-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <button title="{{ __('Edit') }}" class="text-yellow-600 hover:text-yellow-900"
                                    wire:click="$emit('openModal', 'writer.couriers.edit', {{ json_encode(['courier' => $courier->id]) }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <button title="{{ __('Delete') }}" class="text-yellow-600 hover:text-yellow-900"
                                    wire:click="$emit('openModal', 'writer.couriers.delete', {{ json_encode(['courier' => $courier->id]) }})">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-gray-500 py-3 px-4" colspan="7">@lang("No item")</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="py-4 px-3">
            {{ $couriers->links() }}
        </div>
    </div>
