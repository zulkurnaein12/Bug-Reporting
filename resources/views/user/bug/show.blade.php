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
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    @if ($bug->image)
                        <img src="{{ asset('storage/' . $bug->image) }}" class="img-fluid rounded-start">
                    @endif
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $bug->name }}</h5>
                        <h5>
                            @if ($bug->status == 'SOLVED')
                                <span class="badge bg-success">{{ $bug->status }}</span>
                            @elseif($bug->status == 'NO SOLVED')
                                <span class="badge bg-danger text-light">{{ $bug->status }}</span>
                            @endif
                        </h5>
                        <p class="card-text">{{ $bug->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body mt-2">
                        <h3 class="card-title">Add Comment</h3>
                        <form method="post" action="{{ route('user.comment.add') }}">
                            @csrf
                            <div>
                                <textarea name="comment_body" class="form-control" id="" cols="30" rows="6"></textarea>
                                <input type="hidden" name="bug_id" value="{{ $bug->id }}">
                            </div>
                            <div class="d-flex gap-2 form-group mt-2">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                                <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample1" role="button"
                                    aria-expanded="false" aria-controls="collapseExample1">
                                    <i class="bi bi-chat-dots-fill"></i> Comments
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Card Programmer --}}
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body mt-2">
                        @foreach ($tasks as $task)
                            @if ($task->users->avatar)
                                <img src="{{ asset('storage/' . $task->users->avatar) }}" alt="" align="left"
                                    style="width: 40px; height: 40px; border-radius: 50%;">
                            @else
                                <img src="{{ asset('nice') }}/assets/img/profile-img.jpg" alt="" align="left"
                                    style="width: 40px; height: 40px; border-radius: 50%;">
                            @endif
                            &nbsp;&nbsp;{{ $task->users->name }}
                            &nbsp;&nbsp;@if ($task->status == 'PENDING')
                                <span class="badge bg-primary text-light">{{ $task->status }}</span>
                            @elseif($task->status == 'WAITING APPROVAL')
                                <span class="badge bg-warning text-light">{{ $task->status }}</span>
                            @elseif($task->status == 'APPROVED')
                                <span class="badge bg-success text-light">{{ $task->status }}</span>
                            @elseif($task->status == 'REJECTED')
                                <span class="badge bg-danger text-light">{{ $task->status }}</span>
                            @endif
                            <br>
                            <br><br>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Card Comment --}}
            <div class="collapse" id="collapseExample1">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title">Comment :</h4>
                                    @foreach ($comments as $comment)
                                        <img src="{{ asset('storage/' . $comment->users->avatar) }}" alt=""
                                            class="rounded-circle" style="width: 40px; height: 40px;">
                                        <strong>{{ $comment->users->name }} -
                                            {{ $comment->created_at->diffForHumans() }}
                                            <a class="btn btn-primary m-lg-3" data-bs-toggle="collapse"
                                                href="#collapseExample-{{ $comment->id }}" role="button"
                                                aria-expanded="false" aria-controls="collapseExample">
                                                Reply Comment
                                            </a></strong>
                                        <p>{{ $comment->message }}</p>
                                        <a class="btn btn-primary mb-3" data-bs-toggle="collapse"
                                            href="#collapse-{{ $comment->id }}" role="button" aria-expanded="false"
                                            aria-controls="collapse">Reply</a>
                                        <div class="collapse" id="collapse-{{ $comment->id }}">
                                            <form method="post" action="{{ route('user.reply.add') }}">
                                                @csrf
                                                <div>
                                                    <input type="text" class="form-control form-control-sm"
                                                        name="comment_body">
                                                    <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                                                </div>
                                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <input type="submit" class="btn btn-warning mt-2" value="Reply">
                                                </div>
                                            </form>
                                        </div>
                                        <br>
                                        @foreach ($comment->comments as $reply)
                                            <div class="collapse" id="collapseExample-{{ $comment->id }}">
                                                <div class="media media-body p-3">
                                                    <img src="{{ asset('storage/' . $comment->users->avatar) }}"
                                                        alt="" class="rounded-circle"
                                                        style="width: 40px; height: 40px;">
                                                    <strong class="text-muted">{{ $reply->users->name }} -
                                                        {{ $reply->created_at->diffForHumans() }}</strong>
                                                    <p class="text-muted"> {{ $reply->message }}</p>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
