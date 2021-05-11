<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                    <div class="col-md-12" @if ($video->processing_percentage<100)
                        wire:poll
                    @endif >
                        <img src="{{asset($this->video->thumbnail)}}" class="img-thumbnail" alt="">

                        {{$this->video->processing_percentage}}
                    </div>


                <form wire:submit.prevent="update">
                    <div  class="form-group">
                        <label for="title">Title</label>
                        <input wire:model="video.title" type="text" class="form-control">
                        @error('video.title')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <input wire:model="video.description" type="text" class="form-control">
                        @error('video.description')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="visibility">Visibility</label>
                        <select wire:model="video.visibility" name="visibility" class="form-control">
                            <option value="private">private</option>
                            <option value="public">public</option>
                            <option value="unlisted">unlisted</option>
                        </select>
                        @error('video.visibility')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                        @enderror
                    </div>




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
        </div>
    </div>
</div>
