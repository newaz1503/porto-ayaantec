<div class="modal" id="add_achieve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Add Your Achievement</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('backend.achievement.store')}}" method="post">
                @csrf
                <div class="modal-body text-left">
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Achievement Name</label>
                        <input type="text" class="form-control" id="message-text1" placeholder="Enter Achievement Name" name="name" />
                        @if($errors->has('name'))
                            <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Achievement Count</label>
                        <input type="number" class="form-control" id="message-text1" placeholder="Enter Achievement Count" name="count" />
                        @if($errors->has('count'))
                            <div class="error" style="color: red">{{ $errors->first('count') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Select Icon</label>
                        <input type="text" class="form-control" placeholder="Select icon" data-fa-browser name="icon" />
                        @if($errors->has('icon'))
                            <div class="error" style="color: red">{{ $errors->first('icon') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save and Change</button>
                </div>
            </form>
        </div>
    </div>
</div>