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
        <br>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table id="myDataTable" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bugs as $bug)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $bug->name }}</td>
                                    <td>{{ $bug->description }}</td>
                                    <td>
                                        @if ($bug->image)
                                            <a href="{{ asset('storage/' . $bug->image) }}" width="70px">Image</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td>
                                        @if ($bug->status == 'SOLVED')
                                            <span class="badge bg-info text-light">{{ $bug->status }}</span>
                                        @elseif($bug->status == 'NO SOLVED')
                                            <span class="badge bg-danger text-light">{{ $bug->status }}</span>
                                        @endif
                                    </td>

                                    <td>
                                        <a name="" id="" class="btn btn-primary"
                                            href="{{ route('user.bug.show', $bug->id) }}" role="button">Show
                                            <i class="bi bi-eye-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </section>
    @endsection
