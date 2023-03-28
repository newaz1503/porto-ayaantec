@extends('layouts.backend_app')
@section('style')
<link rel="stylesheet" href="{{  asset('backend_asset') }}/assets/node_modules/dropify/dist/css/dropify.min.css">
@endsection
@section('backend_content')
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Partner</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Partner</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#create__parner" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Create New Partner</button>
            @include('backend.partner.includes.create')
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Start Page Content -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Partners</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($partners as $partner)
                            <tr>
                                <td>1</td>
                                <td><img src="{{ asset($partner->img) }}" alt="{{ asset($partner->img) }}" class="img-fluid" width="60"/></td>
                                <td>{{ $partner->added_by }}</td>
                                <td><a href='{{ route('backend.partner.status',$partner->id) }}' class="label label-{{ ($partner->status === 'On') ? 'success':'warning' }}">{{  $partner->status }}</a> </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-border dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal" data-target="#update__parner_{{ $partner->id }}" href='javascript:void(0)'>Edit</a>
                                            <a class="dropdown-item" href="{{ route('backend.partner.destroy',$partner->id) }}">Delete</a>
                                        </div>
                                    </div>       
                                    @include('backend.partner.includes.update')
                            </td>
                            </tr>
                            @endforeach
                            {{ $partners->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{  asset('backend_asset') }}/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
<script>
$(document).ready(function() {
    // Basic
    $('.dropify').dropify();

    // Translated
    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });
});
</script>
@endsection