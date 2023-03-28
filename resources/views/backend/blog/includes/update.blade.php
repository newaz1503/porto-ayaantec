<div class="modal" id="update__blog__{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Update Your blog</h4>
                <br />
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body text-left">
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Name</label>
                        <input class="form-control" id="message-text1" placeholder="Enter your name" name="name"
                            value="{{ $blog->name }}" />
                    </div>
                    <div class="form-group text-left tage-from-group">
                    
                          @php
                         $tages = json_decode($blog->tage, true);
                        $tage_data = '';
                          @endphp
                          @foreach($tages as $tage)
                          @php
                               $tage_data = $tage
                          @endphp
                          @endforeach                        
                        
                        <label for="message-text" class="control-label">Tage</label>
                        <input type="text" class="form-control fluid" value="{{ $tage_data }}" data-role="tagsinput" id="tagess" placeholder="add tags" style="display: none;" name="tage[]">
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Description</label>
                        <textarea class="form-control" id="message-text1" placeholder="Enter your Description" name="description">{{ $blog->description }}</textarea>
                    </div>
                    <div class="form-group">

                        <h4 class="card-title">blog Type</h4>
                        <br />
                        <select class="form-control custom-select review__type" name="type"
                            data-placeholder="Choose a Category" tabindex="1">
                            <option value="2" {{ $blog->type == 2 ? 'selected' : '' }}>Video Link</option>
                            <option value="1" {{ $blog->type == 1 ? 'selected' : '' }}>Photo</option>
                        </select>
                    </div>
                    <div class="form-group text-left {{ $blog->type == 2 ? ' ' : 'display__none' }} u_blog__text">
                        <label for="message-text" class="control-label ">Blogt Link</label>
                        <textarea class="form-control" id="message-text1" placeholder="Enter your blog link" name="link">{{ $blog->link }}</textarea>
                    </div>
                    <div
                        class="form-group text-left {{ $blog->type == 1 ? ' ' : 'display__none' }} u_blog__screenshot">
                        <label for="message-text" class="control-label ">Blog Photo</label>
                        <input type="file" id="input-file-now-custom-3" name="photo"
                            value="{{ $blog->photo }}" class="dropify" data-height="150"
                            data-default-file="{{ asset($blog->photo) }}" />
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
