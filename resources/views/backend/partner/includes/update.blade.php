<div class="modal" id="update__parner_{{ $partner->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Update Your Partner</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.partner.update',$partner->id) }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body text-left">
                    @csrf
                         <h4 class="card-title">Partner's Logo</h4>
                         <br/>
                         <input type="file" name="img" id="input-file-now" class="dropify" />
                         <br/>
                         <div class="form-group">
                             
                             <h4 class="card-title">Status</h4>
                             <br/>
                            <select class="form-control custom-select" name="status" data-placeholder="Choose a Category" tabindex="1">
                                <option value="On">On</option>
                                <option value="Off">Off</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="sumit" class="btn btn-primary">Save and Change</button>
                </div>
            </form>
        </div>
    </div>
</div>