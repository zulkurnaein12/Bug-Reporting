@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" name="" id="" href="{{ route('admin.user.create') }}">Add</a>
            </div>
        </nav>
    </div>

    <section class="section">

        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data User</h4>
                <br>
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th th scope="col">No</th>
                                <th th scope="col">Name</th>
                                <th th scope="col">Email</th>
                                <th th scope="col">Image</th>
                                <th th scope="col">Job</th>
                                <th th scope="col">Phone</th>
                                <th th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->avatar)
                                            <img src="{{ asset('storage/' . $user->avatar) }}" width="70px" />
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>{{ $user->job }}</td>
                                    <td>{{ $user->phone }}</td>


                                    <td>
                                        <a name="" id="" role="button" class="btn btn-success"
                                            href="{{ route('admin.user.edit', $user->id) }}">
                                            <i class="bi bi-pencil"></i></a>

                                        <a name="" id="" role="button" class="btn btn-primary"
                                            href=" {{ route('admin.user.show', $user->id) }}">
                                            <i class="bi bi-eye"></i></a>

                                        <!-- Vertically centered Modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#verticalycentered">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <div class="modal fade" id="verticalycentered" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"><b>Are you sure delete this table?</b></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <span>All data will be lose</span>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form class="d-inline"
                                                            action="{{ route('admin.user.destroy', [$user->id]) }}"
                                                            method="POST">

                                                            @csrf

                                                            <input type="hidden" name="_method" value="DELETE">

                                                            <input type="submit" value="Delete" class="btn btn-primary">

                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- End Vertically centered Modal-->
                                        </form>



                </div>
            </div>


            </td>
            </tr>
            @endforeach
            </tbody>
            </table>
        </div>
    </section>
@endsection
