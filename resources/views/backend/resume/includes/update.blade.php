<div class="modal" id="resume__updated_{{ $resume->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Update Your Banner</h4>
                <br />
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.resume.update', $resume->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body text-left">

                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Start date</label>
                        <input class="form-control" placeholder="Enter Your Start Date" id="start_date_update" value="{{ $resume->start_date }}" data-dtp="dtp_LYPzY"
                            name="start_date" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">End date</label>
                        <input class="form-control" placeholder="Enter Your End Date" id="end_date_update" data-dtp="dtp_LYPzY"
                            name="end_date" value="{{ $resume->end_date }}"/>
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">orgamization</label>
                        <input class="form-control" id="message-text1" placeholder="Enter your Orgamization"
                            name="orgamization" value="{{ $resume->orgamization }}" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">experience</label>
                        <input class="form-control" id="message-text1" placeholder="Enter your Experience"
                            name="experience"  value="{{ $resume->experience }}"/>
                    </div>
                    <select class="form-control custom-select" name="type" data-placeholder="Choose One"
                        tabindex="1">
                        <option value="1" {{ $resume->experience === 1? 'selected': ''  }}>Education</option>
                        <option value="2" {{ $resume->experience === 2? 'selected': ''  }}>Experience</option>
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
