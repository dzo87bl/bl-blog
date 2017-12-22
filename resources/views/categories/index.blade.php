@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>
                <div class="panel-body">
                    <ul>
                        @foreach($categories as $category)
                            <li>
                                {{ $category->title }} 
                                <a href="{{ route('categories.edit', $category->id) }}">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                </a> 
                                <a href="#" class="btn-del" data-form="form-category-{{ $category->id }}" data-toggle="modal" data-target="#myModal">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a> 
                                <form class="form-horizontal" name="form-category-{{ $category->id }}" id="form-category-{{ $category->id }}" method="post" action="{{ route('categories.destroy', $category->id) }}" role="form">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
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
@endsection