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
                                    <td>{{ $task->bugs->name }}</td>
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
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('user.task.edit', $task->id) }}" role="button">Finish This
                                            Task</i></a>
                                    </td>
                                </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </section>
        {{-- @foreach ($tasks as $task)
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
                                <label for="">Bug Name</label>
                                <input type="text" class="form-control" name="bug_id" value="{{ $task->bugs->name }}">
                                <div class="form-group mt-3">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" id="" rows="3">{{ $task->description ?? '' }}</textarea>
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
        @endforeach --}}
    @endsection
