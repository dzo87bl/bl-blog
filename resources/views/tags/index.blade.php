@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($tag) ? 'Edit tag' : 'New tag' }}</div>
                <div class="panel-body">
                    <form class="form-horizontal" name="form-tag" id="form-tag" method="post" action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" role="form">
                        {{ csrf_field() }}
                        @if(isset($tag))
                            {{ method_field('PUT') }}
                        @endif
                        <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="title" name="title" value="{{ isset($tag->title) ? $tag->title : old('title') }}" placeholder="Title">
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                      </div>
                    </form>
                    <ul>
                        @foreach($tags as $tag)
                            <li>
                                {{ $tag->title }} <span class="badge">{{-- $tag->articles()->count() --}}</span>
                                <a href="{{ route('tags.edit', $tag->id) }}">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a> 
                                <a href="#" class="btn-del" data-form="form-tag-{{ $tag->id }}" data-toggle="modal" data-target="#myModal">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a> 
                                <form class="form-horizontal" name="form-tag-{{ $tag->id }}" id="form-tag-{{ $tag->id }}" method="post" action="{{ route('tags.destroy', $tag->id) }}" role="form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </li>
                        @endforeach
                    </ul>
                    <!-- modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</h4>
                              </div>
                              <div class="modal-body">
                                Are you sure you wont to delete?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> 
                                    No
                                </button>
                                <button type="button" class="btn btn-primary btn-delete">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
                                    Yes
                                </button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- / modal -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection