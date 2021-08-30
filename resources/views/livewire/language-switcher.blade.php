<div>
    <select wire:change="changeLanguage" wire:model="selected">
        @foreach ($languages as $language)
            <option :value="$language">{{ $language }}</option>
        @endforeach
    </select>
</div>
