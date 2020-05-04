@extends('layouts.app')

@section('content')
@php
	$user = $usuario->toArray();
	unset($user['password']);
	unset($user['remember_token']);
	unset($user['created_at']);
	unset($user['updated_at']);
@endphp

@endsection
