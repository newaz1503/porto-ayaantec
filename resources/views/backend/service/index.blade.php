@extends('layouts.backend_app')
@section('style')
    <link rel="stylesheet" href="{{ asset('backend_asset') }}/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('backend_asset') }}/assets/node_modules/iconPicker/fontawesome-browser.css">
@endsection
@section('backend_content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Services</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Service</li>
                </ol>
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal"
                    data-target="#create__service" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Create New
                    Service</button>
                @include('backend.service.includes.create')
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
        @foreach ($services as $service)
            <div class="col-lg-4">
                <div class="card">


                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h4 class="card-title m-0 justy__between"><span> Your Service</span> <span class="d-flex"><a
                                        href="" class="btn btn-success btn-sm" data-toggle="modal"
                                        data-target="#update__service" data-whatever="@mdo">Update your Service</a>
                                    <form action="{{ route('backend.service.destroy', $service->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger ml-2">X</button>
                                    </form>
                                </span></h4>
                        </div>
                        <div class="card-body">
                            <div class="row m-0">
                                <div class="col-lg-12">
                                    <div class="row m-0">
                                        <div class="col-lg-12">
                                            <div class="card border-dark">
                                                <div class="card-body text-center">
                                                    <h2><i class="{{ $service->icon }}"></i></h2>
                                                    <h3>{{ $service->name }}</h3>
                                                    <p class="card-text">{{ $service->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- column -->
                            </div>
                            @include('backend.service.includes.update')
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend_asset') }}/assets/node_modules/dropify/dist/js/dropify.min.js"></script>
    <script src="{{ asset('backend_asset') }}/assets/node_modules/iconPicker/fontawesome-browser.js"></script>
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
