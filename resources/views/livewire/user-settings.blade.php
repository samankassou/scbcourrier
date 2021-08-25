@section('title', __('Settings'))
    <div class="p-3">
        <div class="col-span-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Paramètres</h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Cette page vous permet de modifier vos paramètres de connexion
                        </p>
                    </div>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6 dark:bg-gray-800">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-forms.label for="name" message="Name" />
                                    <x-inputs.text name="name" />
                                    <x-messages.error for="name" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-forms.label for="email" message="Email" />
                                    <x-inputs.email name="email" />
                                    <x-messages.error for="email" />
                                </div>
                                <div class="col-span-6 text-right">
                                    <button type="button"
                                        class="bg-yellow-500 focus:outline-none hover:bg-yellow-800 p-2 text-white text-sm rounded-md"
                                        wire:click="saveInfos">@lang('Update')</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:grid md:grid-cols-3 md:gap-6"></div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6 dark:bg-gray-800">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-forms.label for="oldPassword" message="Current Password" />
                                    <x-inputs.password name="oldPassword" />
                                    <x-messages.error for="oldPassword" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-forms.label for="password" message="New Password" />
                                    <x-inputs.password name="password" />
                                    <x-messages.error for="password" />
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-forms.label for="password_confirmation" message="Confirm Password" />
                                    <x-inputs.password name="password_confirmation" />
                                    <x-messages.error for="password_confirmation" />
                                </div>

                                <div class="col-span-6 text-right">
                                    <button type="button"
                                        class="bg-yellow-500 focus:outline-none hover:bg-yellow-800 p-2 text-white text-sm rounded-md"
                                        wire:click="changePassword">@lang("Update Password")</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
