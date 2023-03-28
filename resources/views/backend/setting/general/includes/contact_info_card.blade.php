<div class="card">
    <div class="card-body">
        <h4 class="card-title justy__between"><span>Contact Information</span> <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#general_contact_info" data-whatever="@mdo">Update</a></h4>
        <p class="card-text">{{ $general->contact_info }}</p> 
        <div class="modal" id="general_contact_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Update Your Contact Information</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('backend.updateContactInfo')}}" method="post">
                        @csrf
                        @method('PUT')
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Contact Information</label>
                                <input class="form-control" id="message-text1" placeholder="Enter your Email" name="contact_info" value="{{ $general->contact_info }}"/>
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
    </div>
</div>