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
                            <li class="list-group-item"> <a href="{{ route('backend.contact.index') }}"><i class="mdi mdi-gmail"></i> Inbox </a></li>
                            <li class="list-group-item active">
                                <a href="{{ route('backend.contact.star') }}"> <i class="mdi mdi-star"></i> Starred </a>
                            </li>
                            <li class="list-group-item ">
                                <a href="{{ route('backend.contact.unread') }}"> <i class="mdi mdi-send"></i> Unread messages </a></li>
                            <li class="list-group-item">
                                <a href="{{ route('backend.contact.total_mail') }}"> <i class="mdi mdi-file-document-box"></i> Total Mails </a>
                            </li>
                        </ul>
                      </div>
                </div>
                <div class="col-lg-9 col-md-8 bg-light border-left">
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
                                            <td class="text-right">  {{ $message->created_at->diffForHumans() }} </td>
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