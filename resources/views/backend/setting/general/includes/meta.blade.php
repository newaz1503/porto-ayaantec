<div class="card">
    <div class="card-body">
        <h4 class="card-title justy__between"><span>Meta informations</span> <a href=""
                class="btn btn-success btn-sm" data-toggle="modal" data-target="#general_meta_info"
                data-whatever="@mdo">Update</a></h4>
        <p class="card-text"><strong>Meta Author : </strong>{{ setting()->meta_author }}</p>
        <img src="{{ asset(setting()->meta_photo) }}" />

        <p class="card-text"><strong>Meta Tages : </strong>
            @foreach (json_decode(setting()->meta_keywords) as $item)
                <span class="badge badge-info">{{ $item }}</span>
            @endforeach
        </p>
        <p class="card-text"><strong>Meta Description : </strong>{{ setting()->meta_description }}</p>
        <div class="modal" id="general_meta_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title" id="exampleModalLabel1">Meta Informations</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="{{ route('backend.meta.update', 'information') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="message-text" class="control-label">Author</label>
                                <input class="form-control" id="message-text1" placeholder="Enter your author"
                                    name="meta_author" value="{{ setting()->meta_author }}" />
                            </div>
                            <div class="form-group text-left">
                                <label for="message-text" class="control-label">Description</label>
                                <textarea class="form-control" id="message-text1" placeholder="Enter your Description" name="meta_description">{{ setting()->meta_description }}</textarea>
                            </div>
                            <div class="form-group text-left">
                                <label for="message-text" class="control-label ">Meta Photo</label>
                                <input type="file" id="input-file-now-custom-3" name="meta_photo" class="dropify"
                                    data-height="150" data-default-file="{{ asset(setting()->meta_photo) }}" />
                            </div>
                            <div class="form-group text-left tage-from-group">
                                <label for="message-text" class="control-label">Tage</label>
                                <input type="text" class="form-control fluid" value="@foreach (json_decode(setting()->meta_keywords) as $item){{ $item }},@endforeach" data-role="tagsinput"
                                    id="tagess" placeholder="add tags" style="display: none;" name="meta_tage">
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
