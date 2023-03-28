@extends('layouts.backend_app')
@section('style')
<link href="{{  asset('backend_asset') }}/dist/css/pages/icon-page.css" rel="stylesheet">
@endsection
@section('backend_content')
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Social Media</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">settings</a></li>
                <li class="breadcrumb-item active">Social Media</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
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
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title m-b-0">New Customers List</h5>
                <p class="text-muted">this is the sample data here for crm</p>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                {{-- <th>Icon</th> --}}
                                <th>Social Media Name</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socials as $social)
                           
                            <tr>
                                {{-- <td><i class="fas fa-address-book"></i></td> --}}
                                <td>{{  $social->social_name }}</td>
                                <td><a href="{{ $social->link }}" target="_blank">Link </a></td>
                                <td><a href='{{ route('backend.social.status',$social->id) }}' class="label label-{{ ($social->status === 'On') ? 'success':'warning' }}">{{  $social->status }}</a> </td>
                                <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#social-{{ $social->id }}" data-whatever="@mdo">Edit</button></td>
                                <div class="modal" id="social-{{ $social->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">{{  $social->social_name }}</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            </div>
                                            <form action="{{ route('backend.social.update',$social->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                            <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="message-text" class="control-label">Link address:</label>
                                                        <textarea class="form-control" id="message-text1"name='link'>{{ $social->link }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="sumit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection