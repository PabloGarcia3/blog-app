@extends('layouts.admin')

@section('title') Editing {{ $post->title }} @endsection

@section('content')
  <div class="content">
    <form class="" action="" method="post">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header bg-light">
                         Edit Post
                      </div>
                      @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                      @endif

                      @if($errors->any())
                        <div class="alert alert-danger">
                          <ul>
                            @foreach($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                        </div>
                      @endif
                      <form action="{{ route('adminPostEditPost', $post->id) }}" method="POST">
                        @csrf
                        <div class="card-body">
                          <div class="row">
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <label for="normal-input" class="form-control-label">Title</label>
                                      <input name="title" id="normal-input" class="form-control" value="{{ $post->title }}">
                                  </div>
                              </div>
                          </div>
                          <div class="row mt-4">
                              <div class="col-md-8">
                                  <div class="form-group">
                                      <label for="placeholder-input" class="form-control-label">Content</label>
                                      <textarea class="form-control" name="content" placeholder="Post Content" rows="10" cols="80">{{ $post->content }}</textarea>
                                  </div>
                              </div>
                          </div>
                          <button class="btn btn-success" type="submit" name="button">Edit Post</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </form>
  </div>
@endsection
