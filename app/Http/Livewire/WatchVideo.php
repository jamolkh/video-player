<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WatchVideo extends Component
{
    public function render()
    {
        return view('livewire.watch-video')
        ->extends('layouts.app');
    }
}
