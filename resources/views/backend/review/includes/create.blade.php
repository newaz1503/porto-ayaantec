<div class="modal" id="create__review" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Create a new Review</h4>
                <br />
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.review.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-left">
                    @csrf
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Name</label>
                        <input class="form-control" placeholder="Enter your Name" name="name" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Title</label>
                        <input class="form-control" placeholder="Enter your Title" name="title" />
                    </div>
                    <div class="form-group">

                        <h4 class="card-title">Review Type</h4>
                        <br />
                        <select class="form-control custom-select review__type" name="type"
                            data-placeholder="Choose a Category" tabindex="1">
                            <option value="">Selece one</option>
                            <option value="1">Screenshot(Photo)</option>
                            <option value="2">Review (Text)</option>
                        </select>
                    </div>
                    <div class="form-group text-left display__none" id="review__text">
                        <label for="message-text" class="control-label ">Review</label>
                        <textarea class="form-control" id="message-text1" placeholder="Enter your Review" name="review_text"></textarea>
                    </div>
                    <div class="form-group text-left display__none" id="review__screenshot">
                        <label for="message-text" class="control-label ">Screenshot</label>
                        <input type="file" id="input-file-now-custom-3" name="review_photo" class="dropify"
                            data-height="150" data-default-file="" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Client Photo</label>
                        <input type="file" id="input-file-now-custom-3" name="photo" class="dropify"
                            data-height="150" data-default-file="" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="sumit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
