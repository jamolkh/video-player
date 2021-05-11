<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideos extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $paginationTheme = 'bootstrap';

    public  $channel;

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function delete(Video $video)
    {

        $this->authorize('delete', $video);

        $deleted = Storage::disk('videos')->deleteDirectory($video->uid);
        if($deleted)
        {
            $video->delete();
        }
        return back();
    }


    public function render()
    {
        return view('livewire.video.all-videos')
            ->with('videos', $this->channel->videos()->paginate(5))
            ->extends('layouts.app');

    }
}
