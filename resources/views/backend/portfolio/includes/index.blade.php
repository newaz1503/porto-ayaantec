{{-- skill section --}}
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span> Your Portfolio Information</span> <a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#add_portfolio" data-whatever="@mdo">Add new Portfolio</a></h4>
    </div>
    {{-- add skill --}}
    @include('backend.portfolio.includes.create')
    {{-- skill List --}}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-dark">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Portfolio List</h4></div>
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
                                                                <th style="width: 5%">Serial No.</th>
                                                                <th style="width: 10%">Category Name</th>
                                                                <th style="width: 15%">Image</th>
                                                                <th style="width: 20%">Title</th>

                                                                <th style="width: 20%">Link</th>
                                                                <th style="width: 10%">Status</th>
                                                                <th style="width: 20%">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach(portfolios() as $key=>$portfolio)
                                                                <tr>
                                                                    <td>{{$key + 1}}</td>
                                                                    <td>{{$portfolio->category->name}}</td>
                                                                    <td>
                                                                        <img src="{{asset('uploads/portfolio/'.$portfolio->image)}}" alt="{{$portfolio->title}}" width="40" height="40">
                                                                    </td>
                                                                    <td>{{$portfolio->title}}</td>
                                                                    
                                                                    <td>{{$portfolio->link}}</td>

                                                                    <td>
                                                                        @if($portfolio->status == 1)
                                                                            <div class="label label-table label-success">Active</div>
                                                                        @else
                                                                            <div class="label label-table label-danger">Disabled</div>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                        @if($portfolio->status == 1)
                                                                            <a href="{{route('backend.portfolio.status', $portfolio->id)}}" class="btn btn-success btn-sm">
                                                                                <i class="fas fa-thumbs-down"></i>
                                                                            </a>
                                                                        @else
                                                                            <a href="{{route('backend.portfolio.status', $portfolio->id)}}" class="btn btn-warning btn-sm">
                                                                                <i class="fas fa-thumbs-up"></i>
                                                                            </a>
                                                                        @endif
                                                                        
                                                                        <button data-toggle="modal" data-target="#edit_portfolio-{{$portfolio->id}}" class="btn btn-primary btn-sm" title="Edit Portfolio">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deletePortfolio({{$portfolio->id}})">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                        <form id="delete-portfolio-{{$portfolio->id}}" action="{{route('backend.portfolio.destroy', $portfolio->id)}}" method="POST" style="display: none">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                               @include('backend.portfolio.includes.update')
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
