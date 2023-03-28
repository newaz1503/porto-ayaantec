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
                 
                    <div class="card-body p-t-0">
                        <div class="card b-all shadow-none">
                            <div class="card-body">
                                <h3 class="card-title m-b-0">Your message title goes here</h3>
                            </div>
                            <div>
                                <hr class="m-t-0">
                            </div>
                            <div class="card-body">
                                <div class="d-flex m-b-40">
                                    <div class="p-l-10">
                                        <h4 class="m-b-0">{{  $message->name }}</h4>
                                        <small class="text-muted">From:{{  $message->email }}</small>
                                    </div>
                                </div>
                                <p><b>Dear {{  $message->name }}</b></p>
                                <p>{{  $message->message }}</p>
                            </div>
                            <div>
                                <hr class="m-t-0">
                            </div>
                            <div class="card-body">
                                <div class="b-all m-t-20 p-20">
                                    <p class="p-b-20">click here to <a href="mailto:{{  $message->email }}">Reply</a>
                                         {{-- or <a href="javascript:void(0)">Forward</a> --}}
                                        </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection