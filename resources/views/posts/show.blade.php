@extends('layouts.app')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Posts</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">{{$post->title}}</li>
    </ol>

    <div class="row">
        <div class="col-md-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>                
            @endif
            <div class="card mb-12">
                <div class="card-body">
                   
                    <h2 style="color:black;text-decoration:none;">{{ $post->title }} 
                                     
                    </h2>
                                      
                        <h6><span class="fas fa-time"></span> Post by {{ $post->postUser->firstName }}
                            {{ $post->postUser->lastName }}, {{ formatDate($post->created_at) }}.</h6>
                    <p>{{ $post->content }}</p>
                    @if($post->user != auth()->user()->id)

                    @else
                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editForm"  title="edit post">
                            <i style="cursor:pointer;" class="fa fa-edit float-sm-left" ></i>        
                        </button>
                        <form action="{{ route('deletePost',['id'=>$post->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" title="Remove Post" type="submit" onclick="return confirm('Are you sure you want to delete this post?');"><i class="fa fa-remove"></i></button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editForm" tabindex="-1" role="dialog" aria-labelledby="label"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="label">Add Post</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('updatePost',['id'=>$post->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <label id="fileLabel">Title</label>
                                <input type='text' id='title' class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $post->title }}">
                                <hr>
                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                 @endif
                            </div>
                            <div class="col-md-12">
                                <label id="selectLab">Content</label>
                                <textarea class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" rows="7" name="content">{{ $post->content }}</textarea>
                                <hr>
                                @if ($errors->has('content'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                    <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                                 @endif
                            </div>                           
                            <div class="col-md-12">
                                <hr>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
@push('js')
<script>

</script>
@endpush