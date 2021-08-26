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
                            <td class="px-4 py-3 text-xs">
                                @if ($courier->status)
                                    <x-courier.status status="{{ $courier->status }}" />
                                @endif
                            </td>
                            <td class="px-4 py-3 text-xs flex items-center gap-1">
                                <a href="{{ route('recipient.couriers.show', $courier->id) }}" title="@lang('Details')"
                                    class="text-yellow-600 hover:text-yellow-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
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
