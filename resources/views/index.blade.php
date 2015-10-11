@extends('orchestra/foundation::layouts.main')

@set_meta('title', 'List of Failed Jobs')

@section('content')
<div class="row">
    <div class="twelve columns white rounded box">
        @include('laravie/quemon::_table')
    </div>
</div>
@stop
