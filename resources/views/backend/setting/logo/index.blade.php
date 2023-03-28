@extends('layouts.backend_app')
@section('style')
<link rel="stylesheet" href="{{  asset('backend_asset') }}/assets/node_modules/dropify/dist/css/dropify.min.css">
@endsection
@section('backend_content')
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Site Logo</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                <li class="breadcrumb-item active">Site Logo</li>
            </ol>
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
   <div class="col-lg-8 m-auto">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backend.logo.update','logo') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <h4 class="card-title">Site Logo</h4>
                    <input type="file" id="input-file-now-custom-3" name="logo" class="dropify" data-height="150" data-default-file="{{  asset($logo->logo) }}" />
                    <div class="col-lg-12 col-md-12 mt-3">
                        <button type="submit" class="btn waves-effect waves-light btn-block btn-info">Update</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('backend.logo.update','favicon') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <h4 class="card-title">Favicon Icon</h4>
                    <input type="file" id="input-file-now-custom-3" name="fav_icon" class="dropify" data-height="150" data-default-file="{{  asset($logo->fav_icon) }}" />
                    <div class="col-lg-12 col-md-12 mt-3">
                        <button type="submit" class="btn waves-effect waves-light btn-block btn-info">Update</button>
                    </div>
                </form>
                </div>
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

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element) {
        console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e) {
        e.preventDefault();
        if (drDestroy.isDropified()) {
            drDestroy.destroy();
        } else {
            drDestroy.init();
        }
    })
});
</script>
@endsection