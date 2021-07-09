@extends('backend.layout.app')

@section('content')  
        <br><br>
        <div class="row">
            <br><br>
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Usuarios</span>
                        <h3>{{ App\Entities\User::all()->count() }}</h3>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            {{-- <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-check-square"></i></span>

                   
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div> --}}
            <!-- /.col -->

        </div>
@endsection


@section('title') INAP AYUDAS PEDAGÓGICAS | BIENVENIDO @endsection
@section('pageTitle')
    <h1> BIENVENIDO <small>AL SISTEMA INAP AYUDAS PEDAGÓGICAS</small> </h1>

@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    </ol>
@endsection
