@extends('layouts.backend_app')
@section('title')
    Portfolio
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link href="{{ asset('backend_asset') }}/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css"
        rel="stylesheet" />
@endsection
@section('backend_content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">General Information</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Setting</a></li>
                    <li class="breadcrumb-item active">General</li>
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
        <div class="col-12">
            @include('backend.setting.general.includes.logo_card')
        </div>
        <div class="col-6">
            @include('backend.setting.general.includes.cv_card')
        </div>
        <div class="col-6">
            @include('backend.setting.general.includes.name_card')
        </div>
        <div class="col-6">
            @include('backend.setting.general.includes.number_card')
        </div>
        <div class="col-6">
            @include('backend.setting.general.includes.email_card')
        </div>
        <div class="col-6">
            @include('backend.setting.general.includes.address_card')
        </div>
        <div class="col-6">
            @include('backend.setting.general.includes.copyright_card')
        </div>
        <div class="col-12">
            @include('backend.setting.general.includes.contact_info_card')
        </div>
        <div class="col-12">
            @include('backend.setting.general.includes.meta')
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend_asset') }}/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('backend_asset') }}/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
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
        <script>
            $(document).on('keypress', 'form input[type="text"]', function(e) {
                if (e.which == 13) {
                    e.preventDefault();
                    return false;
                }
            });
        </script>
@endsection
