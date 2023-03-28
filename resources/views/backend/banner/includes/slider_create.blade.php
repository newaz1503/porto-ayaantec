<div class="modal" id="create_banner_slider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Create a new slieder</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.banner.slider.store') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body text-left">
                        <div class="form-group text-left">
                            <label for="message-text" class="control-label">Banner slider Photo</label>
                            <input type="file" id="input-file-now-custom-3" name="photo" class="dropify" data-height="150" data-default-file="" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="sumit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>