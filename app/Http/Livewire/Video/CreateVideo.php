<?php

namespace App\Http\Livewire\Video;

use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\CreateThumbnailFromVideo;
use Livewire\Component;
use App\Models\Channel;
use App\Models\Video;
use Livewire\WithFileUploads;


class CreateVideo extends Component
{
    use WithFileUploads;

    public Channel $channel;
    public Video $video;
    public $videoFile;

    protected $rules = [
        'videoFile' => 'required|mimes:mp4|max:1228800'
    ];

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.create-video')->extends('layouts.app');
    }

    public function fileCompleted()
    {

    }

    public function fileUpload()
    {
        $this->validate();

        $path = $this->videoFile->store('videos-temp');



        $this->video = $this->channel->videos()->create([
            'title' => 'untitled',
            'description' => 'none',
            'visibility' => 'private',
            'uid' => uniqid(true),
            'path' => explode('/', $path)[1]
        ]);

        CreateThumbnailFromVideo::dispatch($this->video);

        ConvertVideoForStreaming::dispatch($this->video);

        return redirect()->route('video.edit', [
            'channel' => $this->channel,
            'video' => $this->video
        ]);
    }
}
