<div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                @foreach($videos as $video)
                    <div class="card my-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="{{asset($video->thumbnail)}}" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-md-3">
                                    <h5>{{$video->title}}</h5>
                                    <p class="text-truncate"> {{$video->description}}</p>
                                </div>
                                <div class="col-md-2">
                                    {{$video->visibility}}
                                </div>
                                <div class="col-md-2">
                                    <a href="{{route('video.edit', ['channel'=>auth()->user()->channel, 'video'=>$video])}}" class="btn btn-light btn-sm">Edit</a>
                                    <button class="btn btn-danger btn-sm">Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{$videos->links()}}
        </div>

    </div>
</div>
