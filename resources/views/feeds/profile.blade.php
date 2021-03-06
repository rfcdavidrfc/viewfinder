@extends('layouts.app')
@section('content')

@section('title', 'Create Post')

@section('stylesheets')
{{--Upload a new photo--}}
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}

@endsection

@section('content')
    <div class = "container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Upload your photo</h1>
                <hr>
{{--Takes in the title of the photo, album/category, tags, photo itself and description --}}
                {!! Form::open(array('route' => 'feeds.store', 'data-parsley-validate' => '', 'files' => 'true')) !!}
                {{Form::label('title', 'Name:')}}
                {{Form::text('title', null, array('class' => 'form-control', 'required' => '', 'maxlength' => '255'))}}

                {{ Form::label('category_id', 'Album:') }}
                <select class="form-control" name="category_id">

                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>

                {{ Form::label('tags', 'Tags:') }}
                <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                    @foreach($tags as $tag)
                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                    @endforeach

                </select>

                {{ Form::label('featured_image', 'Upload Image',['class' => 'form-spacing-top ']) }}
                {{ Form::file('featured_image') }}

                {{Form::label('body', 'Description:' ,['class' => 'form-spacing-top'])}}
                {{Form::textarea('body', null, array('class' => 'form-control', 'required' => ''))}}

                {{Form::submit('Upload Photo', array ('class' => 'btn btn-success btn-lg btn-block', 'style' => 'margin-top: 20px;'))}}

                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
{{--My scripts--}}
@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>

@endsection