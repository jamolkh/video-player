<div wire:poll>

    @if($channel->image)
        <img src="{{asset('images' . '/' . $channel->image)}}" alt="">
    @endif
    <form wire:submit.prevent="update">
        <div  class="form-group">
            <label for="name">Name</label>
            <input wire:model="channel.name" type="text" class="form-control">
            @error('channel.name')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input wire:model="channel.slug" type="text" class="form-control">
            @error('channel.slug')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea wire:model="channel.description" class="form-control" cols="30" rows="10"></textarea>
            @error('channel.description')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">image</label>
            <input type="file" wire:model="image">
            @error('image')
            <div class="alert alert-danger">
                {{$message}}
            </div>
            @enderror
        </div>
        @if ($image)
            Photo Preview:
            <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail">
        @endif

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
    </form>

</div>
