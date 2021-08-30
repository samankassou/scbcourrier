<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class LanguageSwitcher extends Component
{
    public $languages = ['en', 'fr'];
    public $selected = 'fr';

    public function render()
    {
        return view('livewire.language-switcher');
    }

    public function changeLanguage()
    {
        App::setLocale($this->selected);
        $this->emit('languageChanged');
    }
}
