@section('title', __('Courier'))
    <div class="w-full overflow-hidden rounded-lg shadow-md">
        <div class="flex items-center mb-3 px-3">
            <div class="font-bold text-xl text-gray-500">
                Détails du courrier
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
                <x-couriers.detail-row label="Updated by" value="{{ optional($courier->updatedBy)->name }}" />
            </ul>
        </div>
    </div>
