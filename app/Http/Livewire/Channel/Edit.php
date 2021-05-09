<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $channel;
    public $image;



    protected function rules()
    {
        return [
        'channel.name' => 'required|max:255|unique:channels,name,' . $this->channel->id,
        'channel.slug' => 'required|max:255|unique:channels,slug,' . $this->channel->id,
        'channel.description'=> 'nullable|max:1000|unique:channels,description,' . $this->channel->id,
        'image' =>'nullable|image|max:1024',
    ];
    }


    public function mount(Channel $channel)
    {
        $this->channel = $channel;

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $this->authorize('update', $this->channel);
        $this->validate();
        $this->channel->update([
            'name' => $this->channel->name,
            'slug' => $this->channel->slug,
            'description' => $this->channel->description,
        ]);
        //check if file is submitted

        if($this->image)
        {
            //save image
            $image = $this->image->storeAs('images', $this->channel->uid . '.png');
            $imageName = explode('/', $image)[1];

            //resize and convert to png
            $img = Image::make(storage_path() . '/app/' . $image)
                ->encode('png')
                ->fit(80, 80, function($constraint){
                    $constraint->upsize();
                })->save();

            $this->channel->update([
               'image' => $imageName
            ]);
        }

        session()->flash('message' , 'This channel has been updated');
        return redirect()->route('channel.edit', ['channel'=>$this->channel->slug]);
    }

    public function render()
    {
        return view('livewire.channel.edit');
    }
}
