@extends('layouts.app')
@section('breadcrumb')
    <div id="carouselContent" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
        </div>
    </div>
@endsection

<style>
</style>
@section('content')

<?php
$user = auth()->user();
?>

@include('layouts.messages')
<div class="edit-bar">
    <nav class="navbar navbar-expand-lg shadow rounded" style="background-color:{{request()->edit == 1 ? '#53ade9' : '#05b52c'}}; height:52px">
        <div class="col-auto text-white font-weight-bold">
            You are viewing in {{request()->edit == 1 ? 'EDIT' : 'LIVE'}} mode
        </div>
        @if(request()->edit == 1)
            <a href="{{route('getLandingPage')}}" class="btn btn-success">View Live</a>
        @else
            <a href="{{route('getLandingPage', ['edit' => '1'])}}" class="btn btn-light">Edit</a>
        @endif
    </nav>
</div> 
<div class="container-fluid" style="background-color:white;">
    @include('sections.topBanner')
</div>
<div class="container-fluid col-sm-10 section-padding">
    @include('sections.croppingAdvisories')
</div>
<hr class="my-0">
<div class="container-fluid col-sm-10 section-padding">
    @include('sections.bulletin')
</div>
<hr class="my-0">
<div class="container-fluid col-sm-10 section-padding">
    @include('sections.analyticsDashboard')
</div>
<hr class="my-0">
<div class="container-fluid" style="background-color:#0a3f20 !important;">
    <div class="container-fluid col-sm-10 section-padding" style="background-color:#0a3f20 !important;">
        @include('sections.remoteSensingMaps')
    </div>
</div>
<hr class="my-0">
<div class="container-fluid col-sm-10 section-padding">
    @include('sections.newsAndInformation')
</div>
<hr class="my-0">
<div class="container-fluid py-5" style="background-color:#5893CB !important;">
    @include('sections.appDownload')
</div>

<footer class="">
    <img alt="iFarm Footer" src="/storage/page_images/ifarm_footer.png" style="width:100%">
</footer>
<style>
    .section-padding{
        padding:40px;
        background-color:white;
    }
    .bg-ghost{
        background-color:ghostwhite;
    }
    .content-margin{
        margin-left: 15rem;
        margin-right: 15rem;
    }
    .section{
        padding-top:3rem;
        padding-bottom:3rem;
    }
    .hover-overlay {
        transition: .5s ease;
        height:100%;
        opacity: 0;
        position: absolute;
        z-index:1000;
        text-align: right;
    }
    .overlay-container{
        position: relative;
        background-color:rgba(0,0,0,0);
    }
    .overlay-container:hover .bottom-overlay{
        opacity: 0.5;
    }
    img{
        transition: .5s ease;
    }
    .overlay-container:hover img{
        opacity: 0.3;
    }
    .overlay-container:hover{
        background-color:rgba(0,0,0,.15);
        transition: .5s ease;
    }
    .overlay-container:hover .hover-overlay, .overlay-container:hover .hover-overlay-text{
        opacity: 1;
    }
    .card-image-overlay{
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        padding: 1.25rem;
    }
    .center-vertically{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .line-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
    }
    .fill-container{
        margin-left:-2%;
        margin-right:-2%;
    }
    .nav-item{
        font-size:smaller !important;
    }
    .nav-tabs > li > a{
        margin-left: 5px !important;
        margin-right: 5px !important;
        border: 1px solid lightgray !important;
    }

    .nav-item.active > a {
        color:black !important;
    }
</style>

@endsection
