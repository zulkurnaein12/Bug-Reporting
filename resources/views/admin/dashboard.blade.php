@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Programmer Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Programmer</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-person-plus-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $programmers }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End programmer Card -->

                    <!-- Bug Handled Card-->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Bug Handled</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bug-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $bugs }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- Bug Handler Card-->

                    <!-- Best Solution Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Best Solution</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-check-lg"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $approved }}</h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Best Solution Card -->

                </div>
            </div>
            <!-- Buttom side columns -->

            <!-- Right side columns -->
            <div class="col-lg-3">

                <!-- Task Card -->
                <div class="card info-card sales-card">
                    <div class="card-body">
                        <h5 class="card-title">Task</h5>
                        <div class="activity">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-list-task"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $tasks }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Task Card -->
            </div><!-- End Right side colomns -->
        </div>
    </section>
@endsection
