@extends('layouts.admin')
@section('content')
    @if(Session::has('deleted_media'))
        <p class="alert-danger">{{session('deleted_media')}}</p>
    @endif

    <h1> MEDIA </h1>



            <table class="table">
                <thead>
                <tr>

                    <th>id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                @if($photos)
                @foreach($photos as $photo)
                    <tr>

                        <td> {{$photo->id}}</td>


                        <td><img height="100px" src=" {{ URL::to('/') }}/images/{{$photo->file}}" alt="no photo"></td>

                        <td>{{$photo->created_at ? $photo->created_at: 'no date' }}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                            {{csrf_field()}}



                            <div class="form-group">
                                {!! Form::submit('DELETE post',['class'=>'btn btn-danger']) !!}
                            </div>

                            {!! Form::close() !!}





                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

    @endif

@stop