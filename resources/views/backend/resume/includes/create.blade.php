<div class="modal" id="create__resume" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Create a new partner</h4>
                <br />
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.resume.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-left">

                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Start date</label>
                        <input class="form-control" placeholder="Enter Your Start Date" id="mdate" data-dtp="dtp_LYPzY"
                            name="start_date" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">End date</label>
                        <input class="form-control" placeholder="Enter Your End Date" id="end_date" data-dtp="dtp_LYPzY"
                            name="end_date" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">orgamization</label>
                        <input class="form-control" id="message-text1" placeholder="Enter your Orgamization"
                            name="orgamization" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">experience</label>
                        <input class="form-control" id="message-text1" placeholder="Enter your Experience"
                            name="experience" />
                    </div>
                    <select class="form-control custom-select" name="type" data-placeholder="Choose One"
                        tabindex="1">
                        <option value="1">Education</option>
                        <option value="2">Experience</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="sumit" class="btn btn-primary">Save and Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
