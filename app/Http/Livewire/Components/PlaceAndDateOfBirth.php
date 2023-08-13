<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class PlaceAndDateOfBirth
{
    public static function make($value) {
        return \Carbon\Carbon::parse($value)->format('d, M Y');
    }
}
