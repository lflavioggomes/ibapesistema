@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content_header')
<h1>Candidatos Cadastrados</h1>
@stop

@section('content')
@can('admin')

Em Breve
@endcan


@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop

