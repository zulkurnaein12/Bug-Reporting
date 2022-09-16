@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">


                    <!-- Member Card -->
                    <div class="col-xxl-4 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Member</h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people-fill"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $users }}</h6>
                                        <span class="text-success small pt-1 fw-bold">0%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End member Card -->

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
                                        <span class="text-success small pt-1 fw-bold">0%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
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
                                        <span class="text-success small pt-1 fw-bold">0%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
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
                                        <h6>0</h6>
                                        <span class="text-success small pt-1 fw-bold">0%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>
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
                                    <span class="text-success small pt-1 fw-bold">0%</span> <span
                                        class="text-muted small pt-2 ps-1">increase</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Task Card -->
            </div><!-- End Right side colomns -->

        </div>
    </section>
@endsection
