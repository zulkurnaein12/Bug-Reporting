@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" name="" id="" href="{{ route('admin.user.index') }}">Back</a>
            </div>
        </nav>
    </div>

    <!--card show bug-->
    <section class="section">
        <div class="card">
            <div class="card-body mt-3">
                <h4 class="card-title">Show User</h4>

                <div class="row">
                    <div class="col-md-5">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $user->name }} </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $user->email }} </td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                        @if ($user->avatar)
                                            <img src="{{ asset('storage/' . $user->avatar) }}" width="128px">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                    <!-- BTAS -->

                    <div class="col-md-12">
                        <table class="table table-borderless">
                            <thead>
                                <th>Task</th>

                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Start</th>
                                    <th>End</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $task->users->name }}</td>
                                        <td>
                                            @if ($task->status == 'PENDING')
                                                <span class="badge bg-primary text-light"
                                                    style="font-size: 13px">{{ $task->status }}</span>
                                            @elseif($task->status == 'WAITING APPROVAL')
                                                <span class="badge bg-warning text-light"
                                                    style="font-size: 13px">{{ $task->status }}</span>
                                            @elseif($task->status == 'APPROVED')
                                                <span class="badge bg-success text-light"
                                                    style="font-size: 13px">{{ $task->status }}</span>
                                            @elseif($task->status == 'REJECTED')
                                                <span class="badge bg-danger text-light"
                                                    style="font-size: 13px">{{ $task->status }}</span>
                                            @endif
                                        </td>
                                        <td>{{ $task->start }}</td>
                                        <td>{{ $task->end }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--card end show bug-->
@endsection
