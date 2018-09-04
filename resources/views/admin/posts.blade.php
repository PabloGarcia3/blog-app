@extends('layouts.admin')

@section('title')Admin Posts @endsection

@section('content')
  <div class="content">
  <div class="card">
      <div class="card-header bg-light">
          Admin Posts
      </div>

      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-striped">
                  <thead>
                  <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>Created at</th>
                      <th>Updated at</th>
                      <th>Comments</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($posts as $post)
                  <tr>
                      <td>{{ $post->id }}</td>
                      <td class="text-nowrap"><a href="{{ route('singlePost', $post->id) }}">{{ $post->title }}</a></td>
                      <td>{{ $post->content }}</td>
                      <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                      <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                      <td>{{ $post->comments->count() }}</td>
                      <td>
                        <button href="{{ route('adminPostEdit', $post->id) }}" class="btn-warning">Edit</button>
                        <form id="adminDeletePost-{{ $post->id }}" method="POST" action="{{ route('adminDeletePost', $post->id) }}">@csrf</form>
                        <button  action="{{ route('adminDeletePost', $post->id) }}" class="btn-danger" data-toggle="modal" data-target="#deletePostModal-{{$post->id}}">Remove</button>
                      </td>
                  </tr>
                  @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
@foreach($posts as $post)
  <div class="modal fade" id="deletePostModal-{{ $post->id }}" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">You are about to delete {{ $post->title }}.</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete {{ $post->title }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">No, Cancel</button>
        <form id="adminDeletePost-{{ $post->id }}" method="POST" action="{{ route('adminDeletePost', $post->id) }}">@csrf
        <button type="submit" class="btn btn-primary">Yes, Delete</button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endforeach
@endsection
