@extends('layouts.admin')

@section('content')

@section('content')
    @if(Session::has('deleted_post'))
        <p class="alert-danger">{{session('deleted_post')}}</p>
    @endif
    @if(Session::has('updated_post'))
        <p class="alert-danger">{{session('updated_post')}}</p>
    @endif
    @if(Session::has('Created_post'))
        <p class="alert-danger">{{session('Created_post')}}</p>
    @endif

   <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>


              <th>Id</th>
              <th>Photo</th>
              <th>OWNER</th>
              <th>Category </th>

              <th>Title</th>
              <th>body</th>
              <th>View</th>
              <th>View Comments</th>
              <th>Created_at</th>
              <th>Updated_at</th>



          </tr>
        </thead>
        <tbody>
        @if($posts)
           @foreach($posts as $post)

               <tr>
                   <td>{{$post->id}}</td>
                   <td><img height="100px" src=" {{ URL::to('/') }}/images/{{$post->photo ? $post->photo['file']: 'no user photo'}}" alt="no photo"></td>
                   <td><a href="{{route('admin.posts.edit',$post->id)}}">{{$post->user['name']}}</a></td>
                   <td>{{$post->category ? $post->category->name :'not categorized'}}</td>

                   <td> {{$post->title}}</td>
                   <td>{{str_limit($post->body,1)}}</td>
                   <td><a href="{{route('home.post',$post->id)}}">View Post</a></td>
                   <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
                   <td>{{$post->created_at->diffForhumans()}}</td>
                   <td> {{$post->updated_at->diffForhumans()}}</td>
               </tr>


            @endforeach
            @endif

        </tbody>
      </table>

@stop