@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Bug</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Bug</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a class="btn btn-primary" name="" id="" href="{{ route('admin.bug.index') }}">Back</a>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form Bug</h4>
                <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if (@$bug)
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="">Nama Bug</label>
                        <input type="text" class="form-control" name="name" id="" required
                            aria-describedby="helpId" placeholder="Nama Bug" value="{{ $bug->name ?? '' }}">
                        {{-- if error validate --}}
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" id="" rows="3">{{ $bug->description ?? '' }}</textarea>
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Image</label>
                        <input id="image" name="image" type="file" class="form-control"
                            value="{{ $bug->image ?? '' }}">
                    </div>
                    <div class="form-group mt-3">
                        <label for="">Status</label>
                        <select class="form-select" name="status" id="floatingSelect"
                            aria-label="Floating label select example" value="{{ $bug->status ?? '' }}">
                            <option selected> -- Choose --</option>
                            <option value="solved">SOLVED</option>
                            <option value="no solved">NO SOLVED</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                </form>

            </div>
        </div>
    </section>
@endsection
