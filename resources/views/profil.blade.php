@extends('adminlte::page')

@section('title', 'Pengaturan Profile')

@section('content_header')
    <h1>Setting Profile</h1>
@stop

@section('content')
<form>
    <div class="form-group">
      <label for="exampleFormControlInput1">Email address</label>
      <input type="email" class="form-control" id="email" placeholder="email">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Password</label>
        <input type="password" class="form-control" id="password" placeholder="password">
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
</form>
@stop

@section('footer')
    <strong>CopyRight &copy; {{date('Y')}}
    <a href="http://ft.unsur.ac.id/" target="_blank">Fakultas Teknik,
    Universitas Suryakancana</a>.</strong> All Right reserved
@stop

@section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
        <script>console.log ('Hi!')</script>
@stop
