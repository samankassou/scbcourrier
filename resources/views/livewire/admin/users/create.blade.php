<div class="sm:mx-auto sm:w-full sm:max-w-md">
    <div class="px-4 py-8 bg-white dark:bg-gray-700 shadow sm:rounded-lg sm:px-10">
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
                <x-forms.label for="role" message="Rôle" />
                <select id="role" wire:ignore wire:model.lazy="role"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white dark:bg-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    <option value="" class="text-gray-300" disabled>Sélectionnez un rôle</option>
                    @foreach ($roles as $role)
                    <option class="py-4" value="{{ $role->name }}">{{ $role->title }}</option>
                    @endforeach
                </select>
                <x-messages.error for="role" />
            </div>

            <div class="mt-6">
                <x-forms.button type="submit" text="Create" />
            </div>
        </form>
    </div>
</div>
