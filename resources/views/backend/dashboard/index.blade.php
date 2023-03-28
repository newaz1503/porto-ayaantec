@extends('layouts.backend_app')
@section('backend_content')
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-right">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                @isset($record)
                @endisset

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
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Users</h4>
                    <h6 class="card-subtitle"></h6>
                    <a type="button" class="btn btn-info btn-rounded m-t-10 float-right" href="{{ url('register') }}">Add New Contact</a>
                    <!-- Add Contact Popup Model -->
                    <div id="add-contact" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true">
                        
                        <!-- /.modal-dialog -->
                    </div>
                    <div class="table-responsive">
                        <table id="demo-foo-addrow"
                            class="table table-bordered m-t-30 table-hover contact-list footable footable-5 footable-paging footable-paging-center breakpoint-lg"
                            data-paging="true" data-paging-size="7" style="">
                            <thead>
                                <tr class="footable-header">
                                    <th style="display: table-cell;">#ID</th>
                                    <th style="display: table-cell;">Name</th>
                                    <th style="display: table-cell;">Email</th>
                                    <th style="display: table-cell;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td class="footable-first-visible" style="display: table-cell;">{{ $loop->index + 1 }}</td>
                                    {{-- <td style="display: table-cell;">
                                        <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user"
                                                width="40" class="img-circle">{{ $user->name }}</a>
                                    </td> --}}
                                    <td style="display: table-cell;">{{ $user->name }}</td>
                                    <td style="display: table-cell;">{{ $user->email }}</td>
                                    <td style="display: table-cell;">
                                        <a class="btn btn-danger btn-sm" href="{{ route('dashboard.user.delete',$user->id) }}">Delete</a>
                                            </div> 
                                    </td>
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
