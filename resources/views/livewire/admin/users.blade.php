@section('title', __('Users'))
{{-- Users Table --}}
<div class="w-full overflow-hidden rounded-lg shadow-md">
    <div class="flex justify-end items-center">
        <div class="m-w-12 my-3 mx-2" wire:click="$emit('openModal', 'admin.users.create')">
            <button type="button"
                class="flex justify-center gap-2 items-center w-full px-4 py-2 text-sm font-medium text-white bg-yellow-600 border border-transparent rounded-md hover:bg-yellow-500 focus:outline-none focus:border-yellow-700 focus:ring-yellow active:bg-yellow-700 transition duration-150 ease-in-out">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                </svg>
               @lang("Create")
            </button>
        </div>
    </div>
    <div class="w-full overflow-x-auto">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">@lang("Name")</th>
                    <th class="px-4 py-3">@lang("Role")</th>
                    <th class="px-4 py-3">@lang("Status")</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @forelse ($users as $user)
                <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full"
                                    src="{{ $user->media[0]->getUrl() }}" alt=""
                                    loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{ $user->name }}</p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                    {{ $user->email }}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        {{ optional($user->roles)->implode('title', ', ') }}
                    </td>
                    <td class="px-4 py-3 text-xs">
                            <label wire:change="toggleUserStatus({{ $user->id }})" for="toogle{{ $user->id }}" class="flex items-center cursor-pointer">
                                <!-- toggle -->
                                <div class="relative">
                                    <!-- input -->
                                    <input id="toogle{{ $user->id }}" type="checkbox" class="sr-only" @if($user->status) checked @endif>
                                    <!-- line -->
                                    <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                    <!-- dot -->
                                    <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                                </div>
                            </label>
                    </td>
                    <td class="px-4 py-3 text-sm">
                        <button title="{{ __("Edit") }}" class="text-yellow-600 hover:text-yellow-900"
                            wire:click="$emit('openModal', 'admin.users.edit', {{ json_encode(["user" => $user->id]) }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </button>
                        <button title="{{ __("Delete") }}" class="text-yellow-600 hover:text-yellow-900" wire:click="$emit('openModal', 'admin.users.delete', {{ json_encode(["user" => $user->id]) }})">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center py-3 text-sm text-gray-500" colspan="4">@lang("No item")</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div>
        {{ $users->links() }}
    </div>
</div>
