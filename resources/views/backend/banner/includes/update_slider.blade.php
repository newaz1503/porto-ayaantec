<div class="modal" id="update_banner_slider_{{ $slider->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Update your slider</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.banner.slider.update',$slider->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
            <div class="modal-body text-left">
                        <div class="form-group text-left">
                            <label for="message-text" class="control-label">Banner slider Photo</label>
                            <input type="file" name="photo" class="dropify" data-height="150" data-default-file="{{ asset($slider->photo) }}" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>