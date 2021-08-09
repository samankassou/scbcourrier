@section('title', __('Couriers'))
{{-- New Table --}}
<div class="w-full overflow-hidden rounded-lg shadow-md">
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">@lang("Recipient")</th>
                    <th class="px-4 py-3">@lang("Object")</th>
                    <th class="px-4 py-3">@lang("Status")</th>
                    <th class="px-4 py-3">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($couriers as $courier)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="px-4 py-3">
                            <div class="flex items-center text-sm">
                                <!-- Avatar with inset shadow -->
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full"
                                        src="{{ optional($courier->recipient)->media[0]->getUrl() }}"
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
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ substr($courier->object, 0, 30).'...' }}
                        </td>
                        <td class="px-4 py-3 text-xs">
                            <x-courier.status status="{{ $courier->status }}" />
                        </td>
                        <td class="px-4 py-3 text-sm">
                            {{ optional($courier->created_at)->format('d/m/Y') }}
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
