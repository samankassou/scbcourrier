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

        </div>

        <div class="mt-6">
            <x-forms.button type="submit" text="Save" />
        </div>
    </form>
</div>
