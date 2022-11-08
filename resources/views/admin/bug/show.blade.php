@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Bug</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Bug</li>
                <li class="breadcrumb-item active">Show</li>
            </ol>
        </nav>
    </div>

    <!--card show bug-->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a class="btn btn-primary" name="" id="" href="{{ route('admin.bug.index') }}">Back</a>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body mt-3">
                <h4 class="card-title">Show Bug</h4>
                <b>Name</b><br> {{ $bug->name }}<br><br>
                <b>Description</b></br> {{ $bug->description }}<br><br>
                <b>Image</b><br>
                @if ($bug->image)
                    <img src="{{ asset('storage/' . $bug->image) }}" width="509px" height="171px">
                @else
                    No Image
                @endif
                <br><br>
                <b>Status</b><br>
                @if ($bug->status == 'NO SOLVED')
                    <span class="badge bg-danger text-light" style="font-size: 16px">{{ $bug->status }}</span>
                @elseif($bug->status == 'SOLVED')
                    <span class="badge bg-info text-light" style="font-size: 16px">{{ $bug->status }}</span>
                @endif
                <br><br>
            </div>
        </div>
        </div>
        </div>
    </section>
    <!--card end show bug-->

    <!--card input task-->
    <section>
        <div class="card">
            <div class="card-body col-md-4">
                <h4 class="card-title">Task</h4>
                <b>Pilih untuk menambahkan user</b></br>
                <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (@$task)
                        @method('PUT')
                    @endif
                    <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                    <div class="d-flex gap-2 form-group mt-3">
                        <select class="form-select"name="user_id" id="">
                            <option disabled value="">-- Pilih Programmer --</option>
                            @foreach ($users as $user)
                                <option value=" {{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--card input end task-->

    <!--card task-->
    <section>
        <div class="card">
            <div class="card-body mt-3">
                <h4 class="card-title">Tabel Task</h4>
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Action</th>
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
                                    <td>
                                        <!-- Modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#basicModal-{{ $task->id }}">
                                            Show <i class="bi bi-eye-fill"></i></a>
                                        </button>
                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--card end task-->
    @foreach ($tasks as $task)
        <!-- Modal -->
        <div class="modal fade" id="basicModal-{{ $task->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Task</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.task.update', $task->id) }}" method="post">
                            @csrf
                            @if (@$task)
                                @method('PUT')
                            @endif
                            <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                            <div class="form-group mt-3">
                                <select class="form-select"name="user_id" id="">
                                    <option disabled value="">Pilih Programmer</option>
                                    @foreach ($users as $user)
                                        <option value=" {{ $user->id }}"
                                            {{ $user->id == $task->user_id ? 'selected' : '' }}>{{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" id="" rows="3">{{ $task->description ?? '' }}</textarea>
                            </div>
                            @php
                                $status = ['PENDING', 'WAITING APPROVAL', 'APPROVED', 'REJECTED'];
                            @endphp
                            <div class="form-group mt-3">
                                <label for="">Status</label>
                                <select class="form-select" name="status" id="floatingSelect"
                                    aria-label="Floating label select example" value="{{ $task->status ?? '' }}">
                                    <option> -- Choose --</option>
                                    @foreach ($status as $stat)
                                        <option value="{{ $stat }}"
                                            {{ $stat == $task->status ? 'selected' : '' }}>{{ $stat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                    <div class="modal-footer d-none">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Basic Modal-->
    @endforeach
@endsection
