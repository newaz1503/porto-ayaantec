<div class="modal" id="add_skill" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Add Your Skill</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.skill.store') }}" method="post">
                @csrf
                <div class="modal-body text-left">
                
                        <div class="form-group text-left">
                        <label for="message-text" class="control-label">Skill Name</label>
                        <input type="text" class="form-control" id="message-text1" placeholder="Enter Skill Name" name="name" />
                        @if($errors->has('name'))
                            <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Skill Percentage</label>
                        <input type="text" class="form-control" id="message-text1" placeholder="Enter Skill Percentage" name="percentage" />
                        
                        @if($errors->has('percentage'))
                            <div class="error" style="color: red">{{ $errors->first('percentage') }}</div>
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