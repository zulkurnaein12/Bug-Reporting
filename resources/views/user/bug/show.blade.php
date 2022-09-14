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
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <a class="btn btn-primary" name="" id="" href="{{ route('user.bug.index') }}">Back</a>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body mt-3">
                <div class="row">
                    <div class="col-md-5">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th></th>
                                    <td>
                                        <p class="text-primary">{{ $bug->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        @if ($bug->status == 'SOLVED')
                                            <span class="badge bg-success">{{ $bug->status }}</span>
                                        @elseif($bug->status == 'NO SOLVED')
                                            <span class="badge bg-danger text-light">{{ $bug->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th></th>
                                    <td>
                                        @if ($bug->image)
                                            <img src="{{ asset('storage/' . $bug->image) }}" width="300px">
                                        @endif
                                    </td>
                                    <td> {{ $bug->description }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>

    <section>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body mt-2">
                        <h3>Add Comment</h3>
                        <form method="post" action="{{ route('user.comment.add') }}">
                            @csrf
                            <div>
                                <input type="text" class="form-control" name="comment_body">
                                <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                            </div>
                            <div>
                                <input type="submit" class="btn btn-primary mt-2" value="Add Comment">
                            </div>
                        </form>
                        <br>
                        <h3>Comment</h3>
                        @foreach ($comments as $comment)
                            <strong>{{ $comment->users->name }} - {{ $comment->created_at->diffForHumans() }}</strong>
                            <p>{{ $comment->message }}</p>
                            <form method="post" action="{{ route('user.reply.add') }}">
                                @csrf
                                <div>
                                    <input type="text" name="comment_body">
                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-warning mt-2" value="Reply" />
                                </div>
                            </form>
                            @foreach ($comment->comments as $reply)
                                <strong class="text-muted">{{ $reply->users->name }} -
                                    {{ $reply->created_at->diffForHumans() }}</strong>
                                <p class="text-muted"> {{ $reply->message }}</p>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body mt-2">
                        <img src="{{ asset('nice') }}/assets/img/logo.png" alt="" align="left"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                        &nbsp;&nbsp;Jack
                        &nbsp;&nbsp;<span class="badge bg-danger text-light">UNSOLVED</span><br>
                        &nbsp;&nbsp;<th>Web Desaigner</th>
                        <br><br>
                        <img src="{{ asset('nice') }}/assets/img/logo.png" alt="" align="left"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                        &nbsp;&nbsp;Jack
                        &nbsp;&nbsp;<span class="badge bg-success text-light">SOLVED</span><br>
                        &nbsp;&nbsp;<th>Web Desaigner</th>
                        <br><br>
                        <img src="{{ asset('nice') }}/assets/img/logo.png" alt="" align="left"
                            style="width: 40px; height: 40px; border-radius: 50%;">
                        &nbsp;&nbsp;Jack
                        &nbsp;&nbsp;<span class="badge bg-primary text-light">ONGOING</span><br>
                        &nbsp;&nbsp;<th>Web Desaigner</th>
                        <br><br>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
