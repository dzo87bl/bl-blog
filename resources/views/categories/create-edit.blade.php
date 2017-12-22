@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($category) ? 'Edit Category' : 'New Category' }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="form-category" id="form-category" method="post" action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" role="form">
                        {{ csrf_field() }}
                        @if(isset($category))
                            {{ method_field('PUT') }}
                        @endif
                      <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ isset($category->title) ? $category->title : old('title') }}" placeholder="Title">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="description" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description">{{ isset($category->description) ? $category->description : old('description') }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="category_id" class="col-sm-2 control-label">Parent</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="parent_id" id="parent_id">
                              <option value="">Choose</option>
                              @foreach($categories as $category)
                                <option value="{{ $category->id }}"{{ isset($article->parent_id) && ($category->id == $article->parent_id) ? ' selected' : null }}>{{ $category->title }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection