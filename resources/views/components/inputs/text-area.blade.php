<div class="mt-1 rounded-md shadow-sm">
    <textarea rows="3" wire:model.lazy="{{ $name }}" id="{{ $name }}" name="{{ $name }}"
        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md placeholder-gray-400 focus:outline-none focus:ring-yellow focus:border-yellow-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error($name) border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror"></textarea>
</div>
