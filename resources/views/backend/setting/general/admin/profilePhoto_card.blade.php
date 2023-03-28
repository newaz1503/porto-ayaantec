<div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('backend.updateAdminPhoto') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <h4 class="card-title">Admin Photo</h4>
                <input type="file" id="input-file-now-custom-3" name="photo" class="dropify" data-height="150" data-default-file="{{  url('uploads/home/admin/'.$admin->photo) }}" />
                <div class="col-lg-12 col-md-12 mt-3">
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-info">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-lg-3"></div>
    
 
</div>