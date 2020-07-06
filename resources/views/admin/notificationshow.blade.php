@extends('layouts.app-dash')

@section('content')
<notification-show :id="{{ json_encode($data) }}"></notification-show>
@endsection
