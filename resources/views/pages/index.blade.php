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
<div class="container-fluid">
    <div class="content-margin">   
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="nav-item mx-2">
                        <a href="home" class="nav-link bg-ghost"><i class="fa fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="planting" class="nav-link bg-ghost" id="tabFrmPlant"><i class="fa fa-seedling"></i> Planting </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="harvesting" class="nav-link bg-ghost" id="tabFrmHarvest"><i class="fa fa-sign-language"></i> Harvesting </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="damage-assessment" class="nav-link bg-ghost" id="tabFrmDmg"><i class="fa fa-clipboard-check"></i> Damage assessment </a>
                    </li>
                    <li class="nav-item mx-2">
                        <a href="rehabilitation-and-interventions" class="nav-link bg-ghost" id="tabFrmRehab"><i class="fa fa-hands-helping"></i> Rehabilitation and interventions </a>
                    </li>
                    <li class="nav-item active mx-2">
                        <a href="crop" class="nav-link bg-white"><i class="fa fa-home"></i> Crop Monitoring</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content-margin" style="background-color:white">
        @include('sections.topBanner')
        @include('sections.croppingAdvisories')
        <hr class="my-0">
        @include('sections.bulletin')
        <hr class="my-0">
        @include('sections.remoteSensingMaps')
        <hr class="my-0">
        @include('sections.analyticsDashboard')
        <hr class="my-0">
        @include('sections.newsAndInformation')
        <hr class="my-0">
        @include('sections.appDownload')
    </div>
</div>
<footer class="mt-5">
    <img alt="iFarm Footer" src="/storage/page_images/ifarm_footer.png" style="width:100%">
</footer>
<style>
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
</style>

@endsection
