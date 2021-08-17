<div class="px-4 py-8 bg-white  dark:bg-gray-700 shadow sm:rounded-lg sm:px-10">
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 gap-3">

            <div>
                <x-forms.label for="recipient" message="Assignee" />
                <select id="recipient" wire:model="recipient"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <option value="">Sélectionnez un attributaire</option>
                    @foreach ($recipients as $recipient)
                        <option class="py-4" value="{{ $recipient->id }}">{{ $recipient->name }}</option>
                    @endforeach
                </select>
                <x-messages.error for="recipient" />
            </div>

            <div class="mt-6 md:mt-0">
                <x-forms.label for="comments" message="Comments" />
                <x-inputs.text-area name="comments" />
                <x-messages.error for="comments" />
            </div>

        </div>

        <div class="mt-6">
            <x-forms.button type="submit" text="Save" />
        </div>
    </form>
</div>
