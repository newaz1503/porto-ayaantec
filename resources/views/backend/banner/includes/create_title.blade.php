<div class="modal" id="create_banner_title" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Create a new title</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.banner.title.store') }}" method="post">
                @csrf
            <div class="modal-body text-left">
                        <div class="form-group text-left">
                            <label for="message-text" class="control-label">Banner Title</label>
                            <input type="text" name="title" class="form-control" />
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