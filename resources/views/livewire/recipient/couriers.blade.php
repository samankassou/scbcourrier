@section('title', __('Couriers'))
{{-- New Table --}}
<div class="w-full overflow-hidden rounded-lg shadow-md">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">@lang("Code")</th>
                    <th class="px-4 py-3">@lang("Date")</th>
                    <th class="px-4 py-3">@lang("Sender")</th>
                    <th class="px-4 py-3">@lang("Object")</th>
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
                    <td class="px-4 py-3 text-sm">
                        {{ substr($courier->comments, 0, 30).'...' }}
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <x-courier.status status="{{ $courier->status }}" />
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <a href="{{ route('recipient.couriers.show', $courier->id) }}" title="@lang('Details')"
                            class="text-yellow-600 hover:text-yellow-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="py-3 text-center text-sm text-gray-500" colspan="4">@lang("No item")</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $couriers->links() }}
    </div>
</div>
