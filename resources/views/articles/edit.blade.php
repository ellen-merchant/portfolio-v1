@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('articles.update', ['id' => $article->id]) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" required value="{{ $article->title }}">
        </div>
        <div class="form-group">
            <label for="section">Section</label>
            <textarea class="form-control" id="section" name="section">{!! $article->section !!}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
            <img class="mt-2" src="{{ $article->getPublicImage() }}" />
        </div>
        <div class="form-group">
            <label for="view">View</label>
            <input type="text" class="form-control" name="view" id="view" value="{{ $article->view }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection

@section('js')
    <script>
        AlloyEditor.editable("section");
    </script>
@endsection