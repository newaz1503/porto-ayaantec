
{{-- about section --}}
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span> Your About Information</span> <a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#update__about" data-whatever="@mdo">Update your About Info</a></h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="card border-dark">
                                <div class="card-header bg-info">
                                    <h4 class="m-b-0 text-white">About Content</h4></div>
                                <div class="card-body">
                                    <h2>{{ setting()->about_title }}</h2>
                                    <p class="card-text">{{ setting()->about_description }}</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- column -->
            <div class="col-lg-4 col-md-4">
                <!-- Card -->
                <div class="card">
                    <div class="card-header" style="height:400px; overflow:hidden">
                        <img class="card-img-top img-responsive" src="{{  asset(setting()->about_image) }}" alt="Card image cap">
                    </div>
                </div>
                <!-- Card -->
            </div>
            <!-- column -->
        </div>
        
        <div class="modal" id="update__about" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Update Your Banner</h4>
                        <br/>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('backend.about.update',setting()->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="modal-body text-left">
                            @csrf
                                 <div class="form-group text-left">
                                    <label for="message-text" class="control-label">About Title</label>
                                    <input class="form-control" id="message-text1" placeholder="Enter title" name="about_title" value="{{ setting()->about_title }}"/>
                                </div>
                                <div class="form-group text-left">
                                    <label for="message-text" class="control-label">About Description</label>
                                    <textarea class="form-control" id="message-text1" placeholder="Enter Description" name="about_description">{{ setting()->about_description }}</textarea>
                                </div>
                                <div class="form-group text-left">
                                    <label for="message-text" class="control-label">About Image</label>
                                    <input type="file" id="input-file-now-custom-3" name="about_image" class="dropify" data-height="150" data-default-file="{{url(setting()->about_image)}}" />
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
