@extends('layouts.backend_app')
@section('style')
<link href="{{  asset('backend_asset') }}/dist/css/pages/inbox.css" rel="stylesheet">
@endsection
@section('backend_content')
    
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Contact Message</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Message</li>
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
 <!-- ============================================================== -->
 <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="card-body inbox-panel"><a href="app-compose.html" class="btn btn-danger m-b-20 p-10 btn-block waves-effect waves-light">Compose</a>
                        <ul class="list-group list-group-full">
                            <li class="list-group-item active"> <a href="{{ route('backend.contact.index') }}"><i class="mdi mdi-gmail"></i> Inbox </a></li>
                            <li class="list-group-item ">
                                <a href="{{ route('backend.contact.star') }}"> <i class="mdi mdi-star"></i> Starred </a>
                            </li>
                            <li class="list-group-item ">
                                <a href="{{ route('backend.contact.unread') }}"> <i class="mdi mdi-send"></i> Unread messages </a></li>
                            <li class="list-group-item">
                                <a href="{{ route('backend.contact.total_mail') }}"> <i class="mdi mdi-file-document-box"></i> Total Mails </a>
                            </li>
                        </ul>
                        {{-- <h3 class="card-title m-t-40">Labels</h3>
                        <div class="list-group b-0 mail-list"> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-info m-r-10"></span>Work</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-warning m-r-10"></span>Family</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-purple m-r-10"></span>Private</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-danger m-r-10"></span>Friends</a> <a href="javascript:void(0)" class="list-group-item"><span class="fa fa-circle text-success m-r-10"></span>Corporate</a> </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 bg-light border-left">
                    {{-- <div class="card-body">
                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                            <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-inbox-arrow-down"></i></button>
                            <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-alert-octagon"></i></button>
                            <button type="button" class="btn btn-secondary font-18"><i class="mdi mdi-delete"></i></button>
                        </div>
                        <div class="btn-group m-b-10 m-r-10" role="group" aria-label="Button group with nested dropdown">
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-folder font-18 "></i> </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
                            </div>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-label font-18"></i> </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
                            </div>
                        </div>
                        <button type="button " class="btn btn-secondary m-r-10 m-b-10"><i class="mdi mdi-reload font-18"></i></button>
                        <div class="btn-group" role="group">
                            <button id="btnGroupDrop1" type="button" class="btn m-b-10 btn-secondary font-18 dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> More </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1"> <a class="dropdown-item" href="javascript:void(0)">Mark as all read</a> <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a> </div>
                        </div>
                    </div> --}}
                    <div class="card-body p-t-0">
                        <div class="card b-all shadow-none">
                            <div class="inbox-center table-responsive">
                                <table class="table table-hover no-wrap">
                                    <tbody>
                                        @foreach ($messages as $message)
                                           
                                        <tr style="background:{{  $message->view_status === 'unread' ? '#e9e9e9;': '' }}">
                                            <td style="width:40px">
                                                <div class="custom-control custom-checkbox mr-sm-2">
                                                    {{-- <input type="checkbox" class="custom-control-input" id="checkbox0" value="check">
                                                    <label class="custom-control-label" for="checkbox0"></label> --}}
                                                </div>
                                            </td>
                                            <td style="width:40px" class="hidden-xs-down">
                                                <a href="{{ route('backend.contact.star.status',$message->id) }}">
                                                @if ($message->status === 'star')
                                                <i style="color:#ffcb0e" class="mdi mdi-star"></i>
                                                @else
                                                <i style="color:black" class="mdi mdi-star"></i>
                                                @endif
                                            </a>
                                               </td>
                                            <td class="hidden-xs-down">{{  $message->name }}</td>
                                            <td class="max-texts"> <a href="{{ route('backend.contact.details',$message->id) }}" ></span> {{  $message->message }}</td>
                                            <td class="hidden-xs-down"><i class="fa fa-paperclip"></i></td>
                                            <td class="text-right"> {{ $message->created_at->diffForHumans() }} </td>
                                        </tr>
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
@endsection