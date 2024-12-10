@extends('layouts.app')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
        </div>

    </div>

    <div class="row">
        <div class="col-12 col-xl-12 stretch-card">
            <div class="row flex-grow">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Employees</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-12">
                                    <h3 class="mb-2">Employees</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <a href="#">View All</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Meetings</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-12">
                                    <h3 class="mb-2">Meetings</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-danger">
                                            <a href="#">View All</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <h6 class="card-title mb-0">Events</h6>
                                <div class="dropdown mb-2">
                                    <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-12 col-xl-12">
                                    <h3 class="mb-2">Events</h3>
                                    <div class="d-flex align-items-baseline">
                                        <p class="text-success">
                                            <a href="#">View All</a>
                                            <!-- <span>+2.8%</span>
                                            <i data-feather="arrow-up" class="icon-sm mb-1"></i> -->
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

</div>
@endsection