@extends('templates/default')

@section('title')
{{ Lang::get('platform/content::general.title') }}
@stop

@section('assets')

@stop

@section('scripts')

@stop

@section('content')
<div class="page-header">
	<h3>
		{{ Lang::get('platform/content::form.create.legend') }}

		<small>{{ Lang::get('platform/content::form.create.summary') }}</small>

		<div class="pull-right">
			<a href="{{ URL::to(ADMIN_URI . '/content') }}" class="btn btn-inverse btn-small">{{ Lang::get('button.back') }}</a>
		</div>
	</h3>
</div>

<form class="form-horizontal" action="{{ Request::fullUrl() }}" method="POST" accept-char="UTF-8" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="csrf_token" value="{{ csrf_token() }}">

	<!-- Name -->
	<div class="control-group">
		<label class="control-label" for="name">{{ Lang::get('platform/content::form.name') }}:</label>
		<div class="controls">
			<input type="text" name="name" id="name" value="{{ Input::old('name') }}" placeholder="{{ Lang::get('platform/content::form.name') }}" required>
			<span class="help-block">{{ Lang::get('platform/content::form.name_help') }}</span>
		</div>
	</div>

	<!-- Slug -->
	<div class="control-group">
		<label class="control-label" for="slug">{{ Lang::get('platform/content::form.slug') }}:</label>
		<div class="controls">
			<input type="text" name="slug" id="slug" value="{{ Input::old('slug') }}" placeholder="{{ Lang::get('platform/content::form.slug') }}" required>
			<span class="help-block">{{ Lang::get('platform/content::form.slug_help') }}</span>
		</div>
	</div>

	<!-- Status -->
	<div class="control-group">
		<label class="control-label" for="status">{{ Lang::get('platform/content::form.status') }}:</label>
		<div class="controls">
			<select name="status" id="status" required>
				<option value="1"{{ (Input::old('status') === 1 ? ' selected="selected"' : '') }}>Enabled</option>
				<option value="0"{{ (Input::old('status') === 0 ? ' selected="selected"' : '') }}>Disabled</option>
			</select>
			<span class="help-block">{{ Lang::get('platform/content::form.status_help') }}</span>
		</div>
	</div>

	<!-- Content -->
	<div class="control-group">
		<label class="control-label" for="value">{{ Lang::get('platform/content::form.value') }}:</label>
		<div class="controls">
			<textarea rows="10" name="value" id="value" required>{{ Input::old('value') }}</textarea>
			<span class="help-block">{{ Lang::get('platform/content::form.value_help') }}</span>
		</div>
	</div>

	<!-- Form Actions -->
	<div class="form-actions">
		<a class="btn btn-small" href="{{ URL::to(ADMIN_URI . '/content') }}">{{ Lang::get('button.cancel') }}</a>
		<button class="btn btn-small btn-primary" type="submit">{{ Lang::get('button.update') }}</button>
	</div>
</form>
@stop