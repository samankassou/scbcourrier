<div class="px-4 py-8 bg-white  dark:bg-gray-700 shadow sm:rounded-lg sm:px-10">
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-forms.label for="date" message="Date" />
                <x-inputs.date name="date" />
                <x-messages.error for="date" />
            </div>

            <div class="mt-6 md:mt-0">
                <x-forms.label for="code" message="Code" />
                <x-inputs.text name="code" />
                <x-messages.error for="code" />
            </div>

            <div>
                <x-forms.label for="sender" message="Sender" />
                <x-inputs.text name="sender" />
                <x-messages.error for="sender" />
            </div>

            <div class="mt-6 md:mt-0">
                <x-forms.label for="object" message="Object" />
                <x-inputs.text-area name="object" />
                <x-messages.error for="object" />
            </div>

            <div>
                <x-forms.label for="recipient" message="Assignee" />
                <select id="recipient" wire:ignore wire:model.lazy="recipient"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <option value="">Sélectionnez un attributaire</option>
                    @foreach ($recipients as $recipient)
                    <option class="my-4" value="{{ $recipient->id }}">{{ $recipient->name }}</option>
                    @endforeach
                </select>
                <x-messages.error for="recipient" />
            </div>

            <div class="mt-6 md:mt-0">
                <x-forms.label for="comments" message="Comments" />
                <x-inputs.text-area name="comments" />
                <x-messages.error for="comments" />
            </div>

            <div>
                <x-forms.label for="state" message="State" />
                <select id="state" wire:ignore wire:model.lazy="state"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <option value="">Sélectionnez un état</option>
                    @foreach ($status as $state)
                    <option class="py-4" value="{{ $state }}">{{ $state }}</option>
                    @endforeach
                </select>
                <x-messages.error for="state" />
            </div>

        </div>

        <div class="mt-6">
            <x-forms.button type="submit" text="Create" />
        </div>
    </form>
</div>
