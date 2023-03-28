@extends('layouts.backend_app')
@section('style')
    <link
        href="{{ asset('backend_asset') }}/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet">
    <!-- Page plugins css -->
    <!-- Date picker plugins css -->
    <link href="{{ asset('backend_asset') }}/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css"
        rel="stylesheet" type="text/css" />
@endsection
@section('backend_content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Home About</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
                <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal"
                    data-target="#create__resume" data-whatever="@mdo"><i class="fa fa-plus-circle"></i> Create New
                    Partner</button>
                @include('backend.resume.includes.create')
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">MY RESUME</h4>
            <h6 class="card-subtitle"></h6>
            <button type="button" class="btn btn-info btn-rounded m-t-10 float-right" data-toggle="modal"
                data-target="#create__resume">Add New</button>
            @include('backend.resume.includes.create')
            <div class="table-responsive">
                <table id="demo-foo-addrow"
                    class="table table-bordered m-t-30 table-hover contact-list footable footable-5 footable-paging footable-paging-center breakpoint-lg"
                    data-paging="true" data-paging-size="7" style="">
                    <thead>
                        <tr class="footable-header">
                            <th class="footable-first-visible" style="display: table-cell;">No</th>
                            <th style="display: table-cell;">Start</th>
                            <th style="display: table-cell;">End</th>
                            <th style="display: table-cell;">Orgamization</th>
                            <th style="display: table-cell;">Exprerience or Skill</th>
                            <th style="display: table-cell;">Type</th>
                            <th style="display: table-cell;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resumes as $resume)
                            <tr>
                                <td style="display: table-cell;">{{ $loop->index + 1 }}</td>
                                <td style="display: table-cell;">{{ $resume->start_date }}</td>
                                <td style="display: table-cell;">{{ $resume->end_date }}</td>
                                <td style="display: table-cell;">{{ $resume->orgamization }}</td>
                                <td style="display: table-cell;">{{ $resume->experience }}</td>
                                <td style="display: table-cell;">{{ $resume->type == 1 ? 'Education' : 'Experience' }}</td>
                                <td class="footable-last-visible" style="display: table-cell;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-border dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" data-toggle="modal"
                                                data-target="#resume__updated_{{ $resume->id }}"
                                                href='javascript:void(0)'>Edit</a>
                                            <form action="{{ route('backend.resume.destroy', $resume->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    @include('backend.resume.includes.update')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ asset('backend_asset') }}/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.js">
    </script>
    <!-- Date range Plugin JavaScript -->
    <script src="{{ asset('backend_asset') }}/assets/node_modules/moment/moment.js"></script>
    <script
        src="{{ asset('backend_asset') }}/assets/node_modules/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js">
    </script>

    <script>
        // MAterial Date picker    
        $('#mdate').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });
        $('#end_date').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });
        $('#start_date_update').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });
        $('#end_date_update').bootstrapMaterialDatePicker({
            weekStart: 0,
            time: false
        });
    </script>
    
@endsection
