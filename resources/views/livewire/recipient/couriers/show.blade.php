@section('title', __('Courier'))
    <div class="w-full overflow-hidden rounded-lg shadow-md">
        <div class="flex items-center justify-between mb-3 px-3">
            <div class="font-bold text-gray-500">
                Détails du courrier
            </div>
            <div class="flex">
                <div class="py-4 px-3">
                    <span class="text-sm text-gray-700">Changer l'état en:</span>
                    <select id="state" wire:ignore wire:model="state" wire:change="updateStatus"
                        class="inline-block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                        @foreach ($status as $state)
                            <option value="{{ $state }}">@lang($state)</option>
                        @endforeach
                    </select>
                </div>
                @if ($state !== 'rejected')
                    <div class="py-4 px-3"
                        wire:click="$emit('openModal', 'recipient.couriers.reject', {{ json_encode(['courier' => $courier->id]) }})">
                        <button type="button"
                            class="flex justify-center gap-2 items-center w-full px-3 py-1 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md hover:bg-red-500 focus:outline-none focus:border-red-700 focus:ring-red active:bg-red-700 transition duration-150 ease-in-out">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                            </svg>
                            @lang("Reject")
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="mb-4">
            <ul>
                <x-couriers.detail-row label="Code" value="{{ $courier->code }}" />
                <x-couriers.detail-row label="Date" value="{{ optional($courier->date)->format('d/m/Y') }}" />
                <x-couriers.detail-row label="Sender" value="{{ $courier->sender }}" />
                <x-couriers.detail-row label="Object" value="{{ $courier->object }}" />
                <x-couriers.detail-row label="Assignee" value="{{ optional($courier->recipient)->name }}" />
                <li class="px-4 py-5 border-b border-gray-200 sm:flex sm:items-center">
                    <div class="text-xs leading-4 font-semibold uppercase tracking-wide text-gray-900 sm:w-3/12">
                        @lang("State")
                    </div>
                    <div class="mt-1 text-sm leading-5 sm:mt-0 sm:w-9/12">
                        <x-courier.status status="{{ $courier->status }}" />
                    </div>
                </li>
                <x-couriers.detail-row label="Comments" value="{{ $courier->comments }}" />
                <x-couriers.detail-row label="Created by" value="{{ optional($courier->createdBy)->name }}" />
                <x-couriers.detail-row label="Date of creation"
                    value="{{ optional($courier->created_at)->format('d/m/Y H:i:s') }}" />
                <x-couriers.detail-row label="Last update"
                    value="{{ optional($courier->updated_at)->format('d/m/Y H:i:s') }}" />
                @if ($courier->updatedBy)
                    <x-couriers.detail-row label="Updated by" value="{{ optional($courier->updatedBy)->name }}" />
                @endif
            </ul>
        </div>
    </div>
