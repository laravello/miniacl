@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('acl.verification')</div>
                <div class="panel-body">
                   @lang('acl.verification_text')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
