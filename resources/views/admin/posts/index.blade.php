@extends('layouts.admin')

@section('content')
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
                   <td>{{$post->user['name']}}</td>
                   <td>{{$post->category ? $post->category->name :'not categorized'}}</td>

                   <td> {{$post->title}}</td>
                   <td>{{$post->body}}</td>
                   <td>{{$post->created_at}}</td>
                   <td> {{$post->updated_at}}</td>
               </tr>


            @endforeach
            @endif

        </tbody>
      </table>

@stop