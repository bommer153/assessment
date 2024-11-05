@extends('layouts.app')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Posts</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Posts</li>
    </ol>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#openForm">Add Post</button>

    <div class="modal fade" id="openForm" tabindex="-1" role="dialog" aria-labelledby="label"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label">Add Post</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storePost') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label id="fileLabel">Title</label>
                                <input type='text' id='title' class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title">
                                <hr>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                 @endif
                            </div>
                            <div class="col-md-12">
                                <label id="selectLab">Content</label>
                                <textarea class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" rows="7" name="content"></textarea>
                                <hr>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                 @endif
                            </div>                           
                            <div class="col-md-12">
                                <hr>
                                <button class="btn btn-primary" type="submit">Add Post</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>


    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
         
        </div>

        <div class="card-body">
            @foreach($posts as $post)
                <a href="{{ route('showPost',['slug' => $post->title]) }}"><h2 style="color:black;text-decoration:none;">{{ $post->title }}</h2></a>
                <h6><span class="fas fa-time"></span> Post by {{ $post->postUser->firstName }}  {{ $post->postUser->lastName }}, {{ formatDate($post->created_at) }}.</h6>
                <p>{{ $post->content }}</p>
                <hr>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('js')
<script>


</script>
@endpush