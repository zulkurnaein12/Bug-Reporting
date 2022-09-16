@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>Task</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Task</li>
            </ol>
        </nav>
        <br>
        <section>
            <div class="card">
                <div class="card-body mt-3">
                    <h4 class="card-title">Tabel Task</h4>
                    <table id="myDataTable" class="table">
                        <thead class="table-primary">
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
                                    <td>{{ $task->bugs->name }}</td>
                                    <td>
                                        @if ($task->status == 'PENDING')
                                            <span class="badge bg-primary text-light">{{ $task->status }}</span>
                                        @elseif($task->status == 'WAITING APPROVAL')
                                            <span class="badge bg-warning text-light">{{ $task->status }}</span>
                                        @elseif($task->status == 'APPROVED')
                                            <span class="badge bg-success text-light">{{ $task->status }}</span>
                                        @elseif($task->status == 'REJECTED')
                                            <span class="badge bg-danger text-light">{{ $task->status }}</span>
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
        </section>
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
                            <form action="{{ route('user.task.update', $task->id) }}" method="post">
                                @csrf
                                @if (@$task)
                                    @method('PUT')
                                @endif
                                <input type="hidden" name="bug_id" value="{{ $task->bugs->id }}">
                                <div class="form-group mt-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" id="" rows="3">{{ $task->description ?? '' }}</textarea>
                                </div>
                                @php
                                    $status = ['PENDING', 'WAITING APPROVAL'];
                                @endphp
                                <div class="form-group mt-3">
                                    <label for="">Status</label>
                                    <select class="form-select" name="status" id="floatingSelect"
                                        aria-label="Floating label select example" value="{{ $task->status ?? '' }}">
                                        <option> -- Choose --</option>
                                        @foreach ($status as $stat)
                                            <option value="{{ $stat }}"
                                                {{ $stat == $task->status ? 'selected' : '' }}>{{ $stat }}
                                            </option>
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
