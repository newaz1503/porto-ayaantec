<div class="card">
    <div class="card-body">
        <h4 class="card-title justy__between"><span>CV</span> <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#general_cv" data-whatever="@mdo">Update</a></h4>
        <a download href="{{  asset(setting()->cv) }}" class="btn btn-info">Download Your CV</a> 
        <div class="modal" id="general_cv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Update Your CV</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">                    
                    <form action="{{ route('backend.general.cv.update','cv') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <h4 class="card-title">CV</h4>
                    <input type="file" id="input-file-now-custom-3" name="cv" class="dropify" data-height="150" data-default-file="{{  asset($general->cv) }}" />
                    <div class="col-lg-12 col-md-12 mt-3">
                        <button type="submit" class="btn waves-effect waves-light btn-block btn-info">Update</button>
                    </div>
                </form>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>