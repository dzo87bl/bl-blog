@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ isset($article) ? 'Edit Article' : 'New Article'}}</div>
                <div class="panel-body">
                    <!-- / form -->
                    <form class="form-horizontal" name="form-article" id="form-article" method="post" action="{{ isset($article) ? route('articles.update', $article->id) : route('articles.store') }}" onsubmit="" accept-charset="utf-8" enctype="multipart/form-data" autocomplete="off" role="form" data-parsley-validate="">
                        {{ csrf_field() }}
                        @if(isset($article))
                            {{ method_field('PUT') }}
                        @endif
                      <div class="form-group">
                        <label for="title" class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ isset($article->title) ? $article->title : old('title') }}" placeholder="Title" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="slug" class="col-sm-2 control-label">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ isset($article->slug) ? $article->slug : old('slug') }}" placeholder="Slug" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="content" class="col-sm-2 control-label">Content</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="content" name="content" rows="5" placeholder="Content" required>{{ isset($article->content) ? $article->content : old('content') }}</textarea>
                        </div>
                      </div>
                      <script type="text/javascript">
                        CKEDITOR.replace('content');
                      </script>
                      <div class="form-group">
                      <label for="image" class="col-sm-2 control-label">Image</label>
                      <div class="col-sm-10">
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                          <div class="input-group">
                            <div class="form-control" data-trigger="fileinput">
                              <span class="glyphicon glyphicon-file"></span>
                              &nbsp;
                              <span class="fileupload-preview"></span>
                            </div>
                            <div class="input-group-btn">
                              <a class="btn btn-default btn-file">
                                <span class="fileupload-new"> <span class="glyphicon glyphicon-folder-open"></span> Select file</span>
                                <span class="fileupload-exists">  <span class="glyphicon glyphicon-folder-open"></span>  Change</span>
                                <input type="file" name="image" id="image" class="file-input"/>
                              </a>
                              <a href="#" class="btn btn-default fileupload-exists" data-dismiss="fileupload"> <span class="glyphicon glyphicon-remove"></span> Remove</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="form-group">
                        <label for="category_id" class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category_id" id="category_id">
                              <option value="">Choose</option>
                              @foreach($categories as $category)
                                <option value="{{ $category->id }}"{{ isset($article->category_id) && ($category->id == $article->category_id) ? ' selected' : null }}>{{ $category->title }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tags" class="col-sm-2 control-label">Tags</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" name="tags[]" id="tags" multiple="multiple">
                              <option value="">Choose</option>
                              @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                              @endforeach
                            </select>
                        </div>
                      </div>
                      @if(isset($article))
                      <script>
                        $(document).ready(function() {
                          $('.select2').select2().val({{ json_encode($article->tags()->allRelatedIds()) }}).trigger('change');
                        });
                      </script>
                      @endif
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="checkbox" name="" value="" checked data-toggle="toggle" data-size="mini"> Publish
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Submit</button>
                        </div>
                      </div>
                    </form>
                    <!-- / form -->
                    <!-- modal -->
                    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="formModalTitle"></h4>
                          </div>
                          <div class="modal-body">
                            <p id="formModalBody"></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                              OK
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- / modal -->
                    <!-- script -->
                    <script>
                      $(function() {
                        $('form').parsley({
                          successClass: 'has-success',
                          errorClass: 'has-error',
                          classHandler: function(el) {
                            return el.$element.closest(".form-group");
                          },
                          errorsWrapper: '<span class="help-block"></span>',
                          errorTemplate: "<span></span>"
                        })/*.on('form:error', function() {
                          $('#formModalTitle').html('Error!');
                          $('#formModalBody').html('Please check the required fields!');
                          $('#formModal').modal('show');
                          return false;
                        })*/;
                      });
                    </script>
                    <!-- / script -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection