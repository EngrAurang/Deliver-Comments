@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.campaign.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.campaigns.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="required" for="campaign_name">{{ trans('cruds.campaign.fields.campaign_name') }}</label>
                <input class="form-control {{ $errors->has('campaign_name') ? 'is-invalid' : '' }}" type="text" name="campaign_name" id="campaign_name" value="{{ old('campaign_name', '') }}" required>
                @if($errors->has('campaign_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('campaign_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.domain_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="domain">{{ trans('cruds.campaign.fields.domain') }}</label>
                <input class="form-control {{ $errors->has('domain') ? 'is-invalid' : '' }}" type="text" name="domain" id="domain" value="{{ old('domain', '') }}" required>
                @if($errors->has('domain'))
                    <div class="invalid-feedback">
                        {{ $errors->first('domain') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.domain_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="deliver_comments">{{ trans('cruds.campaign.fields.deliver_comments') }}</label>
                <input class="form-control {{ $errors->has('deliver_comments') ? 'is-invalid' : '' }}" type="number" name="deliver_comments" id="deliver_comments" value="{{ old('deliver_comments', '0') }}" step="1">
                @if($errors->has('deliver_comments'))
                    <div class="invalid-feedback">
                        {{ $errors->first('deliver_comments') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.deliver_comments_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keyword">{{ trans('cruds.campaign.fields.keyword') }}</label>
                <input class="form-control {{ $errors->has('keyword') ? 'is-invalid' : '' }}" type="text" name="keyword" id="keyword" value="{{ old('keyword', '8xbet') }}">
                @if($errors->has('keyword'))
                    <div class="invalid-feedback">
                        {{ $errors->first('keyword') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.keyword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.campaign.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.keyword_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="message">{{ trans('cruds.campaign.fields.message') }}</label>
                <textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" rows="3">{{ old('message', '') }}</textarea>
                @if($errors->has('message'))
                    <div class="invalid-feedback">
                        {{ $errors->first('message') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.campaign.fields.message_helper') }}</span>
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
