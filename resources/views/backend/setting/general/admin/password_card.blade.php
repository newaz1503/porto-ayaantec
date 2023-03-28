<div class="card">
    <div class="card-body">
        <h4 class="card-title justy__between"><span>Password</span> <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#admin_password" data-whatever="@mdo">Update</a></h4>
        
        <p class="card-text">********</p> 
        <div class="modal" id="admin_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Update Your Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('backend.passwordReset')}}" method="post">
                        @csrf
                       @method('put')
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Old Password</label>
                                <input class="form-control" id="message-text1" placeholder="Enter your old Password" name="old_password" value="">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">New Password</label>
                                <input class="form-control" id="message-text1" placeholder="Enter your Password" name="password" value=""/>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Confirm Password</label>
                                <input class="form-control" id="message-text1" placeholder="Enter your Password" name="password_confirmation" value=""/>
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