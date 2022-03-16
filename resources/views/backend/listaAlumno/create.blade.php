@extends('layouts.backend')

@section('content')
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline16-list">
                <div class="sparkline16-hd">
                    <div class="main-sparkline13-hd">
                        <h1>Gestión de alumno {{$salon->grado}}° {{$salon->seccion}} {{$salon->nivel}}</h1>
                    </div>
                    <div class="main-sparkline13-hd">
                        <h1>Docente: {{$salon->docente_nombre}} {{$salon->docente_apellido}}</h1>
                        <h1>{{$listaAlumnos->count()}} Alumnos</h1>
                    </div>
                </div>
                <div class="sparkline16-graph">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('listaAlumnoStore')}}" method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12 ">
                                <input type="hidden" name="salon_id" value="{{$salon->salon_id}}">
                                <div class="form-group">
                                    <label for="dni">DNI</label>
                                    <input type="text" id="dni_alumno" name="dni" class="form-control" placeholder="DNI" >
                                    <input type="hidden" id="alumno_id" >
                                    <a class="btn btn-success" onclick="mostrarAlumno()">Buscar</a>
                                </div>
                                <div class="form-group">
                                    <div class="campo_nombre"><label>Nombres: </label><p id="nombres_alumno"></p></div>
                                    <div class="campo_apellidos"><label>Apellidos: </label><p id="apellidos_alumno"></p></div>
                                </div>
                                <div class="form-group">
                                  <label for="estado">Estado</label><br>
                                  <input type="radio" class="form-check-input" id="estado1" name="estado" value="1" >
                                  <label for="estado1">Activo</label><br>
                                  <input type="radio" class="form-check-input" id="estado2" name="estado" value="0">
                                  <label for="estado2">Desactivado</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Guardar</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<div class="footer-copyright-area">
  <div class="container-fluid">
      <div class="row">
          <div class="col-lg-12">
              <div class="footer-copy-right">
                  <p>Copyright © {{now()->year}}. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
@push('styles')
    <!-- datapicker CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/datapicker/datepicker3.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/listaAlumnoCreate.css')}}">
@endpush

@push('scripts')
    <!-- datapicker JS
	============================================ -->
    <script src="{{ asset('backend/js/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('backend/js/datapicker/datepicker-active.js')}}"></script>
    <script>
      let alumnos= {!!$alumnos !!}
      function mostrarAlumno(){
        var dni = document.getElementById('dni_alumno').value;
        let obj = alumnos.find(o => o.dni === dni);
        console.log(obj.name);
        $("#nombres_alumno").html(obj.name);
        $("#apellidos_alumno").html(obj.last_name);
        $("#alumno_id").val(obj.id)
      }
    </script>
@endpush

@push('sidebar')
  
  <!-- Mobile Menu end -->
  <div class="breadcome-area">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="breadcome-list">
                      <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <div class="breadcome-heading">
                                  
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="breadcome-menu">
                                  <li>
                                      <a href="{{route('home')}}">Home</a> <span class="bread-slash">/</span>
                                  </li>
                                  <li>
                                    <a title="Salones" href="{{route('salonIndex')}}"><span class="bread-blod">Salones</span>/</a>
                                  </li>
                                  <li>
                                    <a title="Lista de alumnos" href="{{route('listaAlumnoIndex', $salon->salon_id)}}"><span class="bread-blod">Listas de Alumnos</span></a>
                                  </li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endpush