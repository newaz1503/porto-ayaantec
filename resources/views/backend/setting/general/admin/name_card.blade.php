<div class="card">
    <div class="card-body">
        <h4 class="card-title justy__between"><span>Name</span> <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#admin_name" data-whatever="@mdo">Update</a></h4>
        <p class="card-text">{{ $admin->name }}</p> 
        <div class="modal" id="admin_name" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Update Your Name</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{route('backend.updateAdminName')}}" method="post">
                        @csrf
                        @method('PUT')
                    <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Name</label>
                                <input class="form-control" id="message-text1" placeholder="Enter your name" name="name" value="{{ $admin->name }}"/>
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