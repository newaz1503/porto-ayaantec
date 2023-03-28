<div class="modal" id="edit_category-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="exampleModalLabel1">Add New Category</h4>
                <br/>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('backend.category.update', $category->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body text-left">
                    @csrf
                        <div class="form-group text-left">
                        <label for="message-text" class="control-label">Category Name</label>
                        <input class="form-control" id="message-text1" placeholder="Enter category Name" name="name" value="{{$category->name}}" />
                        @if($errors->has('name'))
                            <div class="error" style="color: red">{{ $errors->first('name') }}</div>
                        @endif
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