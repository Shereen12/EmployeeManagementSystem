@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-weight:bolder; text-transform:uppercase; font-family: 'Times New Roman', Times, serif">
        Employee Mangement
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection
