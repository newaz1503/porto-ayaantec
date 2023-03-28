{{-- skill section --}}
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span> Your Achievement Information</span> <a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#add_achieve" data-whatever="@mdo">Add new Achievement</a></h4>
    </div>
    {{-- add skill --}}
    @include('backend.about.achievement.includes.create')
    {{-- skill List --}}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-dark">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Achievement List</h4></div>
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
                                                                <th>Count</th>
                                                                <th>Icon</th>
                                                                <th>Created At</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (achievements() as $key=>$achievement)
                                                                <tr>
                                                                    <td>{{$key + 1}}</td>
                                                                    <td>{{$achievement->name}}</td>
                                                                    <td>{{$achievement->count}}</td>
                                                                    <td style="font-size: 22px">
                                                                        <i class="{{$achievement->icon}}"></i>
                                                                    </td>
                                                                    <td>{{$achievement->created_at}}</td>
                                                                    <td>
                                                                        <button data-toggle="modal" data-target="#edit-achieve-{{$achievement->id}}" class="btn btn-primary btn-sm" title="Edit Skill">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteAchieve({{$achievement->id}})">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                        <form id="delete-achieve-{{$achievement->id}}" action="{{route('backend.achievement.destroy', $achievement->id)}}" method="POST" style="display: none">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                               @include('backend.about.achievement.includes.update')
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
