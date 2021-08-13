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
