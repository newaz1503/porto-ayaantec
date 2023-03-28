

<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span> Your Banner Information</span> <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#update__banner" data-whatever="@mdo">Update your Banner</a></h4>
    </div>
    <div class="card-body">
        <div class="row m-0">
            <div class="col-lg-12">
                <div class="row m-0">
                    <div class="col-lg-12">
                            <div class="card border-dark">
                                <div class="card-body">
                                    <h2>{{ setting()->banner_name }}</h2>
                                    <p class="card-text">{{ setting()->banner_description }}</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- column -->
        </div>
        
        <div class="modal" id="update__banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Update Your Banner</h4>
                        <br/>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('backend.banner.update','banner-content') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="modal-body text-left">
                            @csrf
                                
                                 <div class="form-group text-left">
                                    <label for="message-text" class="control-label">Name</label>
                                    <input class="form-control" id="message-text1" placeholder="Enter your Name" name="banner_name" value="{{ setting()->banner_name }}"/>
                                </div>
                                <div class="form-group text-left">
                                    <label for="message-text" class="control-label">Description</label>
                                    <textarea class="form-control" id="message-text1" placeholder="Enter your Description" name="banner_description">{{ setting()->banner_description }}</textarea>
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