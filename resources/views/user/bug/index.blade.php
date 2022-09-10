@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>Bug</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Bug</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"></h4>
                <br>

                <table class="table">
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
@endsection
