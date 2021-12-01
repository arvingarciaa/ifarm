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
        <img alt="iFarm Banner" src="/storage/page_images/ifarm_v1.png" style="width:100%">
        <div class="section">
            <h1 class="text-center">iFarm Cropping Advisories</h1>
            <h6 class="text-center">
                We craft site-specific recommendations for the representative sites of the different climate types.<br>
                Recommendations may or may not be the same with other sites with the same climate type.
            </h6>
            <div class="row mt-4">
                <div class="offset-sm-2 px-5 col-sm-4 text-center">
                    <h4>Crop</h4>
                    <select class="form-control">
                        <option>Corn</option>
                        <option>Rice</option>
                    </select>
                </div>
                <div class="col-sm-4 px-5 text-center">
                    <h4>Site</h4>
                    <select class="form-control">
                        <option>La Paz, Tarlac</option>
                        <option>Concepcion, Tarlac</option>
                      </select>
                </div>
            </div>
            <h3 class="mt-5 text-center">
                Cropping Advisories for Corn in La Paz, Tarlac
            </h3>
            <h6 class="text-center">
                Based on the Rainfall Outlook from April to August 2021 <br>
                Source: Project 1.1 Using Crop Simulation Models for Issuing Crop Advisories to Farmers

                <img alt="iFarm Banner" src="/storage/page_images/cropping.png" style="width:100%">
            </h6>
        </div>
        <hr class="my-0">
        <div class="section">
            <h1 class="text-center">ICMF Corn Bulletin</h1>
            <h5 class="text-center">(October 2021 – February 2022 based on September 2021 Condition)</h5>
            <h6 class="text-center">
                We generate science-based site-specific advisories using SARAi-generated meteorological information for better farm management decision-making.
                <br>Source: Dr. Artemio Salazar; Project 3.3 Integrating Research Results, Communication Planning, and Linking Science to Policy
            </h6>
            <div class="row mt-4">
                <div class="offset-sm-4 col-sm-4 px-5 text-center">
                    <h4>Region</h4>
                    <select class="form-control">
                        <option>Region III - Central Luzon</option>
                      </select>
                </div>
            </div>

            <img alt="iFarm Banner" src="/storage/page_images/corn_bulletin.png" style="width:100%">
        </div>
        <hr class="my-0">
        <div class="section">

            <h1 class="text-center">Weather Forecast and Rainfall Outlook</h1>
            <h6 class="text-center">
                We craft site-specific recommendations for the representative sites of the different climate types.<br>
                Recommendations may or may not be the same with other sites with the same climate type.
            </h6>

            <img alt="iFarm Banner" src="/storage/page_images/14.png" style="width:100%">
        </div>
        <hr class="my-0">
        <div class="section">
            <h1 class="text-center">Analytics and Dashboard</h1>
            <h6 class="text-center">
                We craft site-specific recommendations for the representative sites of the different climate types.<br>
                Recommendations may or may not be the same with other sites with the same climate type.
            </h6>
            <div class="row mt-4 px-5 mx-5">
                <div class="px-5 col-sm-3 text-center">
                    <select class="form-control">
                        <option>Corn</option>
                        <option>Rice</option>
                    </select>
                </div>
                <div class="col-sm-3 px-5 text-center">
                    <select class="form-control">
                        <option>Select Date Range</option>
                      </select>
                </div>
                <div class="col-sm-2 px-5 text-center">
                    <select class="form-control">
                        <option>Tarlac</option>
                      </select>
                </div>
                <div class="col-sm-2 px-5 text-center">
                    <select class="form-control">
                        <option>La Paz</option>
                        <option>Concepcion</option>
                      </select>
                </div>
                <div class="col-sm-2 px-5 text-center">
                    <select class="form-control">
                        <option>Castillo</option>
                        <option>Magao</option>
                        <option>Balanoy</option>
                        <option>Caut</option>
                      </select>
                </div>
            </div>
            <div class="row px-5 mx-5 mt-5">
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/1.jpg" style="width:100%">
                </div>
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/2.jpg" style="width:100%">
                </div>
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/3.jpg" style="width:100%">
                </div>
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/4.jpg" style="width:100%">
                </div>
                
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/5.jpg" style="width:100%">
                </div>
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/6.jpg" style="width:100%">
                </div>
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/7.jpg" style="width:100%">
                </div>
                <div class="col-sm-3">
                    <img alt="iFarm Banner" src="/storage/page_images/8.jpg" style="width:100%">
                </div>
            </div>
            <div class="row px-5 mx-5 mt-5">
                <div class="col-sm-6">
                    <img alt="iFarm Banner" src="/storage/page_images/9.png" style="width:100%">
                </div>
                <div class="col-sm-6">
                    <img alt="iFarm Banner" src="/storage/page_images/10.png" style="width:100%">
                </div>
            </div>
        </div>
        <hr class="my-0">
        <div class="section">
            <h1 class="text-center">News and Information from Central Luzon</h1>
            <h6 class="text-center">
                We craft site-specific recommendations for the representative sites of the different climate types.<br>
                Recommendations may or may not be the same with other sites with the same climate type.
            </h6>
            <img alt="iFarm Banner" src="/storage/page_images/12.png" style="width:100%">
        </div>
        <hr class="my-0">
        <div class="section" style="background-color:#5893CB !important;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="mt-4" style="color:white; font-weight: bold">iFarm Crop Monitoring App</h1>
                        <h3 class="mt-4">Want to access the iFarm outputs on your mobile phones? Download our mobile application now!</h3>
                        <h5 class="mt-4">
                            *Please note that the application is still on testing phase so you may need to download the latest version once a month
                        </h5>
                        <button type="button" class="btn btn-lg btn-success mt-4" style="width:100%;">Download Here</button>
                    </div>
                    <div class="col-sm-6">
                        <img alt="iFarm Banner" src="/storage/page_images/11.png" style="width:100%">
                    </div>
                </div>
            </div>
        </div>
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
        margin-left: 6rem;
        margin-right: 6rem;
    }
    .section{
        padding-top:3rem;
        padding-bottom:3rem;
    }
</style>

@endsection
