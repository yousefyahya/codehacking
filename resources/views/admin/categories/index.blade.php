@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store', 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name: ') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>

        <div class="col-sm-6">
            @if($categories)

                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Updated</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($categories as $category)

                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('admin.categories.edit', $category)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at ? $category->created_at->diffForHumans(): 'No Creation Date'}}</td>
                            <td>{{$category->updated_at ? $category->updated_at->diffForHumans(): 'No update Date'}}</td>
                        </tr>
                    </tbody>

                    @endforeach
                </table>
            @endif
        </div>
    </div>

    <div class="row">
        @include('includes.form_error')
    </div>

@endsection