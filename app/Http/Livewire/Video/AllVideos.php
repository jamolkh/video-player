<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideos extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.video.all-videos')
            ->with('videos', auth()->user()->channel->videos()->paginate(1))
            ->extends('layouts.app');

    }
}
