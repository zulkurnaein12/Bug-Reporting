@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">History</li>
            </ol>
        </nav>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">History</h4>
                <br>

                <table class="table table-hover datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Date</th>
                            <th scope="col">User</th>
                            <th scope="col">Log</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($logs as $log)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $log->created_at }}</td>
                                <td>{{ $log->causer->name }}</td>
                                <td>{{ $log->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

    </section>
@endsection
