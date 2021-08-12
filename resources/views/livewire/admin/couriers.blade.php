@section('title', __('Couriers'))
{{-- New Table --}}
<div class="w-full overflow-hidden rounded-lg shadow-md">
    <div class="flex justify-end items-center">
        <div class="m-w-12 my-3 mx-2" wire:click="$emit('openModal', 'admin.couriers.create')">
            <button type="button"
                class="flex justify-center gap-2 items-center w-full px-3 py-1 text-sm font-medium text-white bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:ring-yellow active:bg-yellow-700 transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                @lang("New")
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
                    <th class="px-4 py-3">@lang("Comments")</th>
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
                            {{ substr($courier->object, 0, 30).'...' }}
                        </td>
                        <td class="px-4 py-3">
                            @if ($courier->recipient)
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="{{ optional($courier->recipient)->getAvatarUrl() }}"
                                        alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                </div>
                                <div>
                                    <p class="font-semibold">{{ optional($courier->recipient)->name }}</p>
                                    <p class="text-xs text-gray-600 dark:text-gray-400">
                                        {{ optional($courier->recipient)->email }}
                                    </p>
                                </div>
                            </div>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ substr($courier->comments, 0, 30).'...' }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            @if ($courier->status)
                            <x-courier.status status="{{ $courier->status }}" />
                            @endif
                        </td>
                        <td class="px-4 py-3 text-xs flex items-center">
                            <button title="{{ __("Edit") }}" class="text-yellow-600 hover:text-yellow-900"
                                wire:click="$emit('openModal', 'admin.couriers.edit', {{ json_encode(["courier" => $courier->id]) }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </button>
                            <button title="{{ __("Delete") }}" class="text-yellow-600 hover:text-yellow-900"
                                wire:click="$emit('openModal', 'admin.couriers.delete', {{ json_encode(["courier" => $courier->id]) }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">@lang("No item")</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $couriers->links() }}
    </div>
</div>
