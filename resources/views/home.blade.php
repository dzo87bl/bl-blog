@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <a href="{{ route('categories.index') }}" class="btn btn-default">Categories</a>
                    <a href="{{ route('categories.create') }}" class="btn btn-default">New Category</a>
                    <a href="{{ route('articles.index') }}" class="btn btn-default">Articles</a>
                    <a href="{{ route('articles.create') }}" class="btn btn-default">New Article</a>
                    <a href="{{ route('tags.index') }}" class="btn btn-default">Tags</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
