<div>


    <div class="d-flex ">
        <div class="d-flex align-items-center" style="color:#909090">
            <span class="material-icons @if($likeActive) text-primary @endif" style="font-size:2rem; cursor: pointer;" wire:click.prevent="like">thumb_up</span>
            <span wire:model="likes" class="mx-2">{{$likes}}</span>
        </div>

        <div class="d-flex align-items-center" style="color:#909090">
            <span class="material-icons @if($dislikeActive) text-primary @endif" style="font-size:2rem; cursor: pointer;" wire:click.prevent="dislike">thumb_down</span>
            <span class="mx-2">{{$dislikes}}</span>
        </div>

    </div>


</div>
