{{-- skill section --}}
<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span> Your Skill Information</span> <a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#add_skill" data-whatever="@mdo">Add new skill</a></h4>
    </div>
    {{-- add skill --}}
   @include('backend.about.skill.includes.create')
    {{-- skill List --}}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-dark">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Skill List</h4></div>
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
                                                                <th>Skill Name</th>
                                                                <th>Skill Percentage</th>
                                                                <th>Created At</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach (skill() as $key=>$skill)
                                                                <tr>
                                                                    <td>{{$key + 1}}</td>
                                                                    <td>{{$skill->name}}</td>
                                                                    <td>
                                                                        <div class="progress progress-xs margin-vertical-10 ">
                                                                            <div class="progress-bar bg-danger" style="width: {{$skill->percentage}}%; height:15px;">{{$skill->percentage}}</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>{{$skill->created_at}}</td>
                                                                    <td>
                                                                        <button data-toggle="modal" data-target="#edit_skill-{{$skill->id}}" class="btn btn-primary btn-sm" title="Edit Skill">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteSkill({{$skill->id}})">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                        <form id="delete-skill-{{$skill->id}}" action="{{route('backend.skill.destroy', $skill->id)}}" method="POST" style="display: none">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                               @include('backend.about.skill.includes.update')
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
