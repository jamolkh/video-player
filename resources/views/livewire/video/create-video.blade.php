<div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card"
                    x-cloak
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false, $wire.fileUpload()"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                    >



                        <div x-cloak class="progress" x-show="isUploading">

                            <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>

                        </div>

                        <div class="card-body">
                            <form x-cloak x-show="!isUploading">
                                <input wire:model="videoFile" type="file">

                            </form>

                            @error('videoFile')
                                <div class="alert alert-danger">
                                    {{$message}}
                                </div>
                            @enderror

                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>
