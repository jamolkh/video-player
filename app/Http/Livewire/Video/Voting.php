<?php

namespace App\Http\Livewire\Video;

use App\Models\Dislikes;
use App\Models\Likes;
use App\Models\Video;
use Livewire\Component;

class Voting extends Component
{
    public $video;
    public $likes;
    public $dislikes;
    public $likeActive;
    public $dislikeActive;

    protected $listeners = ['load_values' => '$refresh'];

    public function mount(Video $video)
    {
        $this->video = $video;
        $this->checkdisLike();
        $this->checkLike();
    }

    public function render()
    {
        $this->likes = $this->video->likes->count();
        $this->dislikes = $this->video->dislikes->count();

        return view('livewire.video.voting')->extends('layouts.app');
    }
    public function checkLike()
    {
        $this->video->liked() ? $this->likeActive = true : $this->likeActive=false;
    }
    public function checkdisLike()
    {
        $this->video->disliked() ? $this->dislikeActive = true : $this->dislikeActive=false;
    }
    public function like()
    {
        if($this->video->liked())
        {
            Likes::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
            $this->likeActive=false;
            $this->emit('load_values');
            return;
        }
        $this->video->likes()->create([
            'user_id' => auth()->id()
        ]);
        Dislikes::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
        $this->dislikeActive=false;

            $this->likeActive = true;
            $this->emit('load_values');
    }

    public function dislike()
    {
        if($this->video->disliked())
        {
            Dislikes::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();
            $this->dislikeActive=false;
            $this->emit('load_values');
            return;
        }
        $this->video->dislikes()->create([
            'user_id' => auth()->id()
        ]);
        Likes::where('user_id', auth()->id())->where('video_id', $this->video->id)->delete();

        $this->dislikeActive=true;
        $this->likeActive=false;
        $this->emit('load_values');
    }
    }

