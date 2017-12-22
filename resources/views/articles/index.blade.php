@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Articles</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Date</th>
                                    <th colspan="3">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->title }}</td>
                                    <td>{!! (strlen($article->content) > 100) ? substr($article->content, 0, strpos($article->content, ' ', 100)) . '...' : $article->content !!}</td>
                                    <td>{{ $article->category->title }}</td>
                                    <td>{{ date('d.m.Y H:i:s', strtotime($article->created_at)) }}</td>
                                    <td class="text-center">
                                        <a href="#">
                                            <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('articles.edit', $article->id) }}">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#" class="btn-del" data-form="form-article-{{ $article->id }}" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </a>
                                        <form class="form-horizontal" name="form-article-{{ $article->id }}" id="form-article-{{ $article->id }}" method="post" action="{{ route('articles.destroy', $article->id) }}" role="form">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
</div>
@endsection