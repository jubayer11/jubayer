@extends('layouts.admin')

@section('content')


    <h1> commnets </h1>

    @if(count($comments)>0)

     <table class="table">
         <thead>
           <tr>
             <th>ID</th>
             <th>Name</th>
             <th>Email</th>
               <th>Comment body</th>
               <th>view</th>
               <th>Replies link</th>
               <th>Approve/un-Approve</th>
               <th>deleting</th>

           </tr>
         </thead>
         <tbody>
         @foreach($comments as $comment)
           <tr>
             <td>{{$comment->id}}</td>
               <td>{{$comment->author}}</td>
               <td>{{$comment->email}}</td>
               <td>{{$comment->body}}</td>
               <td><a href="{{route('home.post',$comment->post->id )}}">VIEW POST</a> </td>
               <td><a href="{{route('admin.comment.replies.show',$comment->id)}}">view Replies </a></td>
               <td>

                   @if($comment->is_active==1)
                       {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                       {{csrf_field()}}

                       <input type="hidden" name="is_active" value="0">

                       <div class="form-group">
                           {!! Form::submit('Un-Approve',['class'=>'btn btn-success']) !!}
                       </div>

                       {!! Form::close() !!}
                   @else
                       {!! Form::open(['method'=>'PATCH','action'=>['PostCommentsController@update',$comment->id]]) !!}
                       {{csrf_field()}}

                       <input type="hidden" name="is_active" value="1">

                       <div class="form-group">
                           {!! Form::submit('Approve',['class'=>'btn btn-info ']) !!}
                       </div>

                       {!! Form::close() !!}


                  @endif

               </td>

               <td>

                   {!! Form::open(['method'=>'DELETE','action'=>['PostCommentsController@destroy',$comment->id]]) !!}
                   {{csrf_field()}}



                   <div class="form-group">
                       {!! Form::submit('DELETE',['class'=>'btn btn-danger']) !!}
                   </div>

                   {!! Form::close() !!}





               </td>

           </tr>
@endforeach

         </tbody>
       </table>

        @else
        <h1 class="text-center">No Comments</h1>

@endif

    @stop