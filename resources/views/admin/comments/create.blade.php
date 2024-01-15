@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.comment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.comments.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="comment_url">Upload Comment CSV</label>
                <input class="form-control {{ $errors->has('comment_url') ? 'is-invalid' : '' }}" type="file" name="comment_url" id="comment_url" accept=".csv" required>
                @if($errors->has('comment_url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('comment_url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.comment.fields.domain_helper') }}</span>
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
