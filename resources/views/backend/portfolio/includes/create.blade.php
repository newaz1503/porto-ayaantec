<div class="modal" id="add_portfolio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Add Portfolio</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.portfolio.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body text-left">
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Category</label>
                        <select name="category" class="form-control">
                            <option value="" selected disabled>Select Category</option>
                            @foreach(categories() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category'))
                            <div class="error" style="color: red">{{ $errors->first('category') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Portfolio Title</label>
                        <input type="text" class="form-control" id="message-text1" placeholder="Enter Title" name="title" />
                        @if($errors->has('title'))
                            <div class="error" style="color: red">{{ $errors->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Portfolio Link</label>
                        <input type="text" class="form-control" id="message-text1" placeholder="Enter link" name="link" />
                        @if($errors->has('link'))
                            <div class="error" style="color: red">{{ $errors->first('link') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Portfolio Description</label>
                        <textarea name="description" rows="5" class="form-control"></textarea>
                        @if($errors->has('description'))
                            <div class="error" style="color: red">{{ $errors->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group text-left">
                        <label for="message-text" class="control-label">Portfolio Image</label>
                        <input type="file" class="form-control" id="message-text1" name="image" />
                        @if($errors->has('image'))
                            <div class="error" style="color: red">{{ $errors->first('image') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save and Change</button>
                </div>
            </form>
        </div>
    </div>
</div>