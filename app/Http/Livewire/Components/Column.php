<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class Column
{
    public $component = 'columns.column';

    public $key;

    public $label;

    public function __construct($label, $key)
    {
        $this->key = $key;
        $this->label = $label;
    }

    public static function make($label, $key)
    {
        return new static($label, $key);
    }

    public function component($component)
    {
        $this->component = $component;

        return $this;
    }
}
