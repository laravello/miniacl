@extends('dashboard')
@section('content')
<div class='row'>
	
	<h3>
	Benutzer {{ $user->id }} bearbeiten
	</h3>
	<div class="container">
		<div class="row">
			<div class="col-md-6 form-group">
				<label>Nachname</label>
				<input class="form-control" value="{{ $user->name }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>Vorname</label>
				<input class="form-control" value="{{ $user->first_name }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>PLZ</label>
				<input class="form-control" value="{{ $user->zip }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>Strasse</label>
				<input class="form-control" value="{{ $user->street }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>Ort</label>
				<input class="form-control" value="{{ $user->place }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>Tel.</label>
				<input class="form-control" value="{{ $user->phone }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>Land</label>
				<input class="form-control" value="{{ $user->country }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>E-Mail</label>
				<input class="form-control" value="{{ $user->email }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>username</label>
				<input class="form-control" value="{{ $user->username }}" type="text"/>
			</div>
			<div class="col-md-6 form-group">
				<label>confirmed</label>
				<select name="done" id="done" class="form-control" onchange="donetask();" onclick="donetask();">
					@if ($user->confirmed == 0)
					<option value="0" SELECTED>Nein</option>
					<option value="1">Ja</option>
					@else
					<option value="1" SELECTED>Ja</option>
					<option value="0">Nein</option>
					@endif
				</select>
			</div>
			<div class="col-md-6 form-group">
				<label>active</label>
				<select name="done" id="done" class="form-control" onchange="donetask();" onclick="donetask();">
					@if ($user->active == 0)
					<option value="0" SELECTED>Nein</option>
					<option value="1">Ja</option>
					@else
					<option value="1" SELECTED>Ja</option>
					<option value="0">Nein</option>
					@endif
				</select>
			</div>
			<div class="col-md-6 form-group">
				<label>erstellt Datum</label>
				{{ $user->created_at }}
				@if (App::getLocale() == 'de')
				{{ $user->created_at->format('d.m.Y H:i:s') }}
				@else
				{{ $user->created_at }}
				@endif
			</div>
			<div class="col-md-6 form-group">
				<label>geändert datum</label>
				@if (App::getLocale() == 'de')
				{{ $user->updated_at->format('d.m.Y H:i:s') }}
				@else
				{{ $user->updated_at }}
				@endif
			</div>
			<div class="col-md-6 form-group">
				
			</div>
			<div class="col-md-12 form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default">Submit</button>
				</div>
			</div>
			
		</div>
		</div> <!-- ./container -->
		@endsection