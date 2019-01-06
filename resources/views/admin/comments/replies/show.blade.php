@extends('layouts.admin')

@section('content')


    <h1> replies </h1>

    @if(count($replies)>0)

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>replies body</th>
                <th>view</th>
                <th>Approve/un-Approve</th>
                <th>deleting</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->id )}}">VIEW POST</a> </td>

                    <td>

                        @if($reply->is_active==1)
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-Approve',['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            {{csrf_field()}}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve',['class'=>'btn btn-info ']) !!}
                            </div>

                            {!! Form::close() !!}


                        @endif

                    </td>

                    <td>

                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                        {{csrf_field()}}

                        <input type="hidden" name="is_active" value="0">


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
        <h1 class="text-center">No replies</h1>

    @endif

@stop