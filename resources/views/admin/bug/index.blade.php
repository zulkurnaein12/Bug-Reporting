@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Bug</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Bug</li>
            </ol>
        </nav>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary" name="" id="" href="{{ route('admin.bug.create') }}">Add</a>
        </div>

    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table id="myDataTable" class="table table-hover table-responsive">
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
                        {{-- @php $no = 1; @endphp --}}
                        @foreach ($bugs as $bug)
                            <tr>
                                {{-- <td>{{ ($bugs->currentPage() - 1) * $bugs->perPage() + $loop->iteration }}</td> --}}
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $bug->name }}</td>
                                <td>{{ $bug->description }}</td>
                                <td>
                                    @if ($bug->image)
                                        <a target="_blank" href="{{ asset('storage/' . $bug->image) }}"
                                            width="70px">Image</a>
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
                                    <div class="container">
                                        <div class="d-flex">
                                            <a name="" id="" class="btn btn-success"
                                                href="{{ route('admin.bug.edit', $bug->id) }}" role="button">
                                                <i class="bi bi-pencil"></i></a>

                                            <a name="" id="" class="btn btn-primary"
                                                href="{{ route('admin.bug.show', $bug->id) }}" role="button">
                                                <i class="bi bi-eye-fill"></i></a>

                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#verticalycentered">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"><b>Are you sure delete this table?</b>
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>All data will be lose</span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form class="d-inline"
                                                                action="{{ route('admin.bug.destroy', [$bug->id]) }}"
                                                                method="POST">

                                                                @csrf

                                                                <input type="hidden" name="_method" value="DELETE">

                                                                <input type="submit" value="Delete" class="btn btn-danger">

                                                            </form>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- End Vertically centered Modal-->
                                        </div>
                                    </div>
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
