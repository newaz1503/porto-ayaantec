<div class="modal" id="update__review_{{ $review->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Create a new Review</h4>
                <br />
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.review.update', $review->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body text-left">
                    @csrf
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Name</label>
                        <input class="form-control" placeholder="Enter your Name" name="name"
                            value="{{ $review->name }}" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Title</label>
                        <input class="form-control" placeholder="Enter your Title" name="title"
                            value="{{ $review->title }}" />
                    </div>
                    <div class="form-group">

                        <h4 class="card-title">Review Type</h4>
                        <br />
                        <select class="form-control custom-select review__type" name="type"
                            data-placeholder="Choose a Category" tabindex="1">
                            <option value="1" {{ $review->type == 1 ? 'selected' : '' }}>Screenshot(Photo)</option>
                            <option value="2" {{ $review->type == 2 ? 'selected' : '' }}>Review (Text)</option>
                        </select>
                    </div>
                    <div class="form-group text-left {{ $review->type == 2 ? ' ' : 'display__none' }} u_review__text">
                        <label for="message-text" class="control-label ">Review</label>
                        <textarea class="form-control" id="message-text1" placeholder="Enter your Review" name="review_text">{{ $review->review_text }}</textarea>
                    </div>
                    <div
                        class="form-group text-left {{ $review->type == 1 ? ' ' : 'display__none' }} u_review__screenshot">
                        <label for="message-text" class="control-label ">Screenshot</label>
                        <input type="file" id="input-file-now-custom-3" name="review_photo"
                            value="{{ $review->review_photo }}" class="dropify" data-height="150"
                            data-default-file="{{ asset($review->review_photo) }}" />
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Client Photo</label>
                        <input type="file" id="input-file-now-custom-3" name="photo" class="dropify"
                            data-height="150" value="{{ $review->photo }}"
                            data-default-file="{{ asset($review->photo) }}" />
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="sumit" class="btn btn-primary">Save And Change</button>
                </div>
            </form>
        </div>
    </div>
</div>
