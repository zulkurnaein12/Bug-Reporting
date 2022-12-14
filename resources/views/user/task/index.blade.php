@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>Task</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Home</a></li>
                <li class="breadcrumb-item active">Task</li>
            </ol>
        </nav>
        <br>
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
                                        <td><a
                                                href="{{ route('user.bug.show', $task->bugs->id) }}">{{ $task->bugs->name }}</a>
                                        </td>
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
                                            @if ($task->status == 'PENDING')
                                                <a name="" id="" class="btn btn-primary"
                                                    href="{{ route('user.task.edit', $task->id) }}" role="button">Finish
                                                    This
                                                    Task</i></a>
                                            @elseif ($task->status == 'WAITING APPROVAL')
                                                <a name="" id="" class="btn btn-primary d-none"
                                                    href="{{ route('user.task.edit', $task->id) }}" role="button">Finish
                                                    This
                                                    Task</i></a>
                                            @elseif ($task->status == 'REJECTED')
                                                <a name="" id="" class="btn btn-primary"
                                                    href="{{ route('user.task.edit', $task->id) }}" role="button">Finish
                                                    This
                                                    Task</a>
                                                <!-- Modal -->
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#basicModal-{{ $task->id }}"><i
                                                        class="bi bi-question-octagon-fill"></i></a>
                                                </button>
                                                @foreach ($tasks as $task)
                                                    <div class="modal fade" id="basicModal-{{ $task->id }}"
                                                        tabindex="-1">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Alert</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>{{ $task->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </td>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection
