@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>


    <div class="col-sm-6">

        {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::submit('update category',['class'=>'btn btn-primary col-sm-6']) !!}
        </div>

        {!! Form::close() !!}

        {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id]]) !!}
        {{csrf_field()}}

        <div class="form-group">
            {!! Form::submit('DELETE CATEGORY',['class'=>'btn btn-danger col-sm-6']) !!}
        </div>


    </div>
    <div class="col-sm-6">


        {!! Form::close() !!}


    </div>

@stop