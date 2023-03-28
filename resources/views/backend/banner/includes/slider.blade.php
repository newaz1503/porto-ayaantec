<div class="card">
    <div class="card-header bg-dark text-white">
        <h4 class="card-title justy__between"><span>Slider Images</span> <a href="" class="btn btn-success btn-md" data-toggle="modal" data-target="#create_banner_slider" data-whatever="@mdo">Add new Slider</a></h4>
    </div>
    {{-- add skill --}}
    @include('backend.banner.includes.slider_create')
    {{-- skill List --}}
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card border-dark">
                            <div class="card-header bg-info">
                                <h4 class="m-b-0 text-white">Slider List</h4></div>
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
                                                                <th style="width: 15%">Serial No.</th>
                                                                <th style="width: 65%">Image</th>
                                                                <th style="width: 20%">Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($sliders as $slider)
                                                                <tr>
                                                                    <td>{{$loop->index + 1}}</td>
                                                                    <td>
                                                                        <img src="{{ asset($slider->photo) }}" alt="{{ $slider->photo }}" width="40" height="40">
                                                                    </td>
                                                                    <td>                                                                        
                                                                        <button data-toggle="modal" data-target="#update_banner_slider_{{ $slider->id }}" class="btn btn-primary btn-sm" title="Edit Portfolio">
                                                                            <i class="fas fa-edit"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm" onclick="deletePortfolio({{$slider->id}})">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                        <form id="delete-portfolio-{{$slider->id}}" action="{{route('backend.banner.slider.delete', $slider->id)}}" method="POST" style="display: none">
                                                                            @csrf
                                                                            @method('delete')
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                               @include('backend.banner.includes.update_slider')
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