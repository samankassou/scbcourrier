<div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
    <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
        <form wire:submit.prevent="save">
            <div>
                <x-forms.label for="email" message="Email address" />
                <x-inputs.email name="email" />
                <x-messages.error for="email" />
            </div>

            <div class="mt-6">
                <x-forms.label for="name" message="Name" />
                <x-inputs.text name="name" />
                <x-messages.error for="name" />
            </div>

            <div class="mt-6">
                <x-forms.button type="submit" text="Save" />
            </div>
        </form>
    </div>
</div>
