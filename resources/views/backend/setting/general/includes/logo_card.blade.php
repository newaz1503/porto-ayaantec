<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('backend.logo.update','logo') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <h4 class="card-title">Site Logo</h4>
                <input type="file" id="input-file-now-custom-3" name="logo" class="dropify" data-height="150" data-default-file="{{  asset($general->logo) }}" />
                <div class="col-lg-12 col-md-12 mt-3">
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-info">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('backend.logo.update','favicon') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <h4 class="card-title">Favicon Icon</h4>
                <input type="file" id="input-file-now-custom-3" name="fav_icon" class="dropify" data-height="150" data-default-file="{{  asset($general->fav_icon) }}" />
                <div class="col-lg-12 col-md-12 mt-3">
                    <button type="submit" class="btn waves-effect waves-light btn-block btn-info">Update</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>