@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">编辑评论</div>
                    <div class="panel-body">

                        @if(count($errors) > 0)
                            <div class="alert-danger">
                                <strong>编辑失败</strong>输入不符合要求<br><br>
                                {!! implode('<br>',$errors->all()) !!}
                            </div>
                        @endif

                        <form action="{{url('admin/comment/'.$comment->id)}}" method="POST">
                            {{ method_field('PUT') }}
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label>Nickname</label>
                                <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required" value="{{ $comment->nickname }}">
                            </div>
                            <div class="form-group">
                                <label>Email address</label>
                                <input type="email" name="email" class="form-control" style="width: 300px;" value="{{ $comment->email }}">
                            </div>
                            <div class="form-group">
                                <label>Home page</label>
                                <input type="text" name="website" class="form-control" style="width: 300px;" value="{{ $comment->website }}">
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required">{{ $comment->content }}</textarea>
                            </div>
                            <button class="btn btn-lg btn-info">提交修改</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection