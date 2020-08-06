@extends('admin.master')
@section('content')           
<div class="boxed">
<div id="content-container">
<div id="page-title">
    <h1 class="page-header text-overflow">Dashboard</h1>
    <div class="searchbox">
        <div class="input-group custom-search-form">
            <input type="text" class="form-control" placeholder="Search..">
            <span class="input-group-btn">
                <button class="text-muted" type="button"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </div>
</div>
<ol class="breadcrumb">
    <li><a href="{{url('/')}}/home">Home</a></li>
    <li><a href="{{url('/')}}/home">Library</a></li>
    <li class="active">Data</li>
</ol>
<div id="page-content">
    <div class="row">
        <div class="col-lg-7">
            <div id="demo-panel-network" class="panel">
                <div class="panel-heading">
                    <div class="panel-control">
                        <button id="demo-panel-network-refresh" data-toggle="panel-overlay" data-target="#demo-panel-network" class="btn"><i class="fa fa-rotate-right"></i></button>
                        <div class="btn-group">
                            <button class="dropdown-toggle btn" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-gear"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{url('/')}}/home">Action</a></li>
                                <li><a href="{{url('/')}}/home">Another action</a></li>
                                <li><a href="{{url('/')}}/home">Something else here</a></li>
                                <li class="divider"></li>
                                <li><a href="{{url('/')}}/home">Separated link</a></li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="panel-title">Network</h3>
                </div>
                <div id="morris-chart-network" class="morris-full-content"></div>
                <div class="panel-body bg-primary" style="position:relative;z-index:2">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="pad-ver media">
                                        <div class="media-left">
                                            <span class="icon-wrap icon-wrap-xs">
                                                <i class="fa fa-cloud fa-2x"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <p class="h3 text-thin media-heading">30%</p>
                                            <small class="text-uppercase">Server Load</small>
                                        </div>
                                    </div>
                                    <div class="progress progress-xs progress-dark-base mar-no">
                                        <div class="progress-bar progress-bar-light" style="width: 30%"></div>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="text-center">
                                        <span class="text-3x text-thin">43</span>
                                        <p>User Online</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mar-ver">
                                <small class="pad-btm"><em>* Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</em></small>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-group bg-trans mar-no">
                                <li class="list-group-item">
                                    <div id="demo-chart-visitors" class="pull-right"></div> Visitors
                                </li>
                                <li class="list-group-item">
                                    <div id="demo-chart-bounce-rate" class="pull-right"></div> Bounce rate
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-success">11</span>
                                    Today sales
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-warning">20</span>
                                    Broken links found
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="panel panel-success panel-colorful text-center">
                        <div class="panel-body">
                            <div id="demo-sparkline-area"></div>
                        </div>
                        <div class="bg-light pad-ver">
                            <h4 class="mar-no text-thin"><i class="fa fa-hdd-o"></i> HDD Usage</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="panel panel-info panel-colorful text-center">
                        <div class="panel-body">
                            <div id="demo-sparkline-line"></div>
                        </div>
                        <div class="bg-light pad-ver">
                            <h4 class="mar-no text-thin">Earning</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <div class="panel panel-purple panel-colorful text-center">
                        <div class="panel-body">
                            <div id="demo-sparkline-bar" class="box-inline"></div>
                        </div>
                        <div class="bg-light pad-ver">
                            <h4 class="mar-no text-thin">Sales</h4>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="panel panel-mint panel-colorful text-center">
                        <div class="panel-body">
                            <div id="demo-sparkline-pie" class="box-inline "></div>
                        </div>
                        <div class="bg-light pad-ver">
                            <h4 class="mar-no text-thin">
                                Top Movie
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel middle">
                <div class="media-left pad-all">
                    <canvas id="demo-weather-xs-icon" width="48" height="48"></canvas>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-thin text-mint">25&#176;</p>
                    <p class="text-muted mar-no">Partly Cloudy Day</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-lg-3">
            <div class="panel media pad-all">
                <div class="media-left">
                    <span class="icon-wrap icon-wrap-sm icon-circle bg-success">
                    <i class="fa fa-user fa-2x"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-thin">241</p>
                    <p class="text-muted mar-no">Registered User</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel media pad-all">
                <div class="media-left">
                    <span class="icon-wrap icon-wrap-sm icon-circle bg-info">
                    <i class="fa fa-user fa-2x"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-thin"></p>
                    <p class="text-muted mar-no">Active Users</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel media pad-all">
                <div class="media-left">
                    <span class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                    <i class="fa fa-comment fa-2x"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-thin">34</p>
                    <p class="text-muted mar-no">Comments</p>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3">
            <div class="panel media pad-all">
                <div class="media-left">
                    <span class="icon-wrap icon-wrap-sm icon-circle bg-danger">
                    <i class="fa fa-dollar fa-2x"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p class="text-2x mar-no text-thin">654</p>
                    <p class="text-muted mar-no">Sales</p>
                </div>
            </div>
        </div>
    </div> 
</div>
@endsection
        

        
