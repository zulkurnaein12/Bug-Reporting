@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>User</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary" name="" id="" href="{{ route('admin.user.index') }}">Back</a>
            </div>
        </nav>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form User</h4>
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="name" id="" required
                                aria-describedby="helpId" placeholder="Username">
                            {{-- if error validate --}}
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputText" name="email" id="" required
                                aria-describedby="helpId" placeholder="Email User" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="file" id="image" name="image"
                                value="{{ old('image') }}">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="phone" id="" required
                                aria-describedby="helpId" placeholder="Phone" value="{{ old('phone') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Job</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputText" name="job" id="" required
                                aria-describedby="helpId" placeholder="Job" value="{{ old('job') }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputText" name="password" id=""
                                required aria-describedby="helpId" placeholder="Job">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection
