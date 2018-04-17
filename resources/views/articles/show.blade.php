@extends('layouts.app', ['mainTitle' => $article->title])

@section('content')
    @auth
        <div class="d-flex mb-3 justify-content-end">
            <a href="{{ route('articles.edit', ['id' => $article->id]) }}"
               class="btn btn-warning mr-2">Edit</a>
            <form action="{{ route('articles.destroy', ['id' => $article->id]) }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="btn btn-danger" value="Delete"
                       onclick="return confirm('Delete?');"/>
            </form>
        </div>
    @endauth
    <div>
        <i>Created: {{ $article->created_at->format('Y-m-d') }} ({{ $article->created_at->diffForHumans() }})</i>
        {!! $article->section !!}
    </div>
    @if($article->hasView())
        @include($article->getFullView())
    @endif
@endsection