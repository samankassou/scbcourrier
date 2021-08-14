@section('title', __('Couriers'))
{{-- New Table --}}
<div class="w-full overflow-hidden rounded-lg shadow-md">
    <div class="flex justify-end items-center dark:bg-gray-700">
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
                    {{-- <th class="px-4 py-3">@lang("Comments")</th> --}}
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
                            {{ substr($courier->object, 0, 20).'...' }}
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
                        {{-- <td class="px-4 py-3 text-sm">
                            {{ substr($courier->comments, 0, 30).'...' }}
                        </td> --}}
                        <td class="px-4 py-3 text-xs">
                            <select wire:change="updateCourierStatus({{ $courier->id }}, $event.target.value)"
                                class="apearance-none mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 dark:text-gray-800 text-xs">
                                <option value=""></option>
                                @foreach ($status as $state)
                                <option class="py-4" value="{{ $state }}" {{ $courier->status === $state ? 'selected' : '' }}>
                                    <x-courier.status status="{{ $state }}" />
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td class="px-4 py-3 text-xs flex items-center gap-1">
                            <a href="{{ route('admin.couriers.show', $courier->id) }}" title="@lang('Details')" class="text-yellow-600 hover:text-yellow-900">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
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
