<div>

    <div class="d-flex align-items-center justify-content-between">

        <div class="d-flex align-items-center">
            <img src="{{asset('/images/' . $channel->image)}}" alt="image" class="rounded-circle">
            <div class="ml-2">
                <h4>{{$channel->name}}</h4>
                <p class="text-sm">
                    {{$channel->subscribers()}} subscribers
                </p>
            </div>
        </div>

        <div>
            <button class="btn btn-lg text-uppercase btn-secondary">Subscribe</button>
        </div>

    </div>

</div>
