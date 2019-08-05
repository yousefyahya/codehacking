@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    <div class="row">

        <div class="col-sm-6">
            {!! Form::model($category, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $category->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Edit Category', ['class'=>'btn btn-primary col-sm-3']) !!}
            </div>

            {!! Form::close() !!}


            {!! Form::open(['method'=>'Delete', 'action'=>['AdminCategoriesController@destroy', $category->id]]) !!}

            <div class="form-group">
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger col-sm-3 m']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>


@endsection