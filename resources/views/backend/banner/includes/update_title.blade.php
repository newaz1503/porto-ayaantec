<div class="modal" id="update_title_{{$title->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Update your title</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.banner.title.update',$title->id) }}" method="post">
                @csrf
                @method('PUT')
            <div class="modal-body text-left">
                        <div class="form-group text-left">
                            <label for="message-text" class="control-label">Title</label>
                            <input type="text" value="{{  $title->title }}" name="title" class="form-control" />
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="sumit" class="btn btn-primary">Save and change</button>
                </div>
            </form>
        </div>
    </div>
</div>