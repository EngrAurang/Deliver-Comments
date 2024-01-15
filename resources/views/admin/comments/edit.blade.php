@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.comment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.comments.update", [$comment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="domain">{{ trans('cruds.comment.fields.domain') }}</label>
                <input class="form-control {{ $errors->has('domain') ? 'is-invalid' : '' }}" type="text" name="domain" id="domain" value="{{ old('domain', $comment->domain) }}" required>
                @if($errors->has('domain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('domain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.domain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="comment_url">{{ trans('cruds.comment.fields.comment_url') }}</label>
                <input class="form-control {{ $errors->has('comment_url') ? 'is-invalid' : '' }}" type="text" name="comment_url" id="comment_url" value="{{ old('comment_url', $comment->comment_url) }}" required>
                @if($errors->has('comment_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.comment_url_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="status">{{ trans('cruds.comment.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text" name="status" id="status" value="{{ old('status', $comment->status) }}">
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection