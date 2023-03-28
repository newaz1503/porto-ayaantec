{{-- skill section --}}
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span> Your Category Information</span> <a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#add_category" data-whatever="@mdo">Add new Category</a></h4>
    </div>
    {{-- add skill --}}
    @include('backend.category.includes.create')
    {{-- skill List --}}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-dark">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Category List</h4></div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- column -->
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Serial No.</th>
                                                                <th>Name</th>
                                                                <th>Status</th>
                                                                <th>Created At</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (categories() as $key=>$category)
                                                                <tr>
                                                                    <td>{{$key + 1}}</td>
                                                                    <td>{{$category->name}}</td>
                                                                    <td>
                                                                        @if($category->status == 1)
                                                                            <div class="label label-table label-success">Active</div>
                                                                        @else
                                                                            <div class="label label-table label-danger">Disabled</div>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$category->created_at}}</td>
                                                                    <td>
                                                                        @if($category->status == 1)
                                                                            <a href="{{route('backend.category.status', $category->id)}}" class="btn btn-success btn-sm">
                                                                                <i class="fas fa-thumbs-down"></i>
                                                                            </a>
                                                                        @else
                                                                            <a href="{{route('backend.category.status', $category->id)}}" class="btn btn-warning btn-sm">
                                                                                <i class="fas fa-thumbs-up"></i>
                                                                            </a>
                                                                        @endif
                                                                        
                                                                        <button data-toggle="modal" data-target="#edit_category-{{$category->id}}" class="btn btn-primary btn-sm" title="Edit Category">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteCategory({{$category->id}})">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                        <form id="delete-category-{{$category->id}}" action="{{route('backend.category.destroy', $category->id)}}" method="POST" style="display: none">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                               @include('backend.category.includes.update')
                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
