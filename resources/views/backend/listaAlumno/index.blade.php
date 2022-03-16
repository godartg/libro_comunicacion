@extends('layouts.backend')

@section('content')

<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                  <div class="main-sparkline13-hd">
                    <h1>Lista de alumnos {{$salon->grado}}° {{$salon->seccion}} {{$salon->nivel}}</h1>
                  </div>
                  <div class="main-sparkline13-hd">
                    <h1>Docente: {{$salon->docente_nombre}} {{$salon->docente_apellido}}</h1>
                    <h1>{{$listaAlumnos->count()}} Alumnos</h1>
                  </div>
                </div>
                <div class="sparkline13-graph">
                    <div class="datatable-dashv1-list custom-datatable-overright">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                            <thead>
                              <tr>
                                <th data-field="id">ID</th>
                                <th data-field="dni">DNI</th>
                                <th data-field="alumno">Alumno</th>
                                <th data-field="estado">Estado</th>
                                <th data-field="created_at">Creado</th>
                                <th data-field="action">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($listaAlumnos as $listaAlumno)
                                <tr>
                                  <td>{{$loop->index+1}}</td>
                                  <td>{{$listaAlumno->dni}}</td>
                                  <td>{{$listaAlumno->name.' '.$listaAlumno->last_name}}</td>
                                  <td>
                                      @if($listaAlumno->estado)
                                        Activo
                                      @else
                                        Desactivo
                                      @endif
                                  </td>
                                  <td>{{$listaAlumno->created_at}}</td>
                                  <td>
                                    @if(Auth::user()->isAbleTo('salon-update'))
                                    <a href="{{route('listaAlumnoEdit', $listaAlumno->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    @endif
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
    <!-- normalize CSS
	============================================ -->
    <link rel="stylesheet" href="{{ asset('backend/css/data-table/bootstrap-table.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/css/data-table/bootstrap-editable.css')}}">
@endpush

@push('scripts')
    <!-- data table JS
		============================================ -->
    <script src="{{ asset('backend/js/data-table/bootstrap-table.js')}}"></script>
    <script src="{{ asset('backend/js/data-table/tableExport.js')}}"></script>
    <script src="{{ asset('backend/js/data-table/data-table-active.js')}}"></script>
    <script src="{{ asset('backend/js/data-table/bootstrap-table-editable.js')}}"></script>
    <script src="{{ asset('backend/js/data-table/bootstrap-editable.js')}}"></script>
    <script src="{{ asset('backend/js/data-table/bootstrap-table-resizable.js')}}"></script>
    <script src="{{ asset('backend/js/data-table/colResizable-1.5.source.js')}}"></script>
    <script src="{{ asset('backend/js/data-table/bootstrap-table-export.js')}}"></script>
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
                                @if(Auth::user()->isAbleTo('lista_alumno-create'))
                                  <a href="{{ route('listaAlumnoCreate', $salon->salon_id) }}" class="btn btn-primary"><i class="fa fa-user-plus"></i>Agregar estudiante</a>
                                @endif
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="breadcome-menu">
                                  <li>
                                    <a href="{{route('home')}}">Home</a> <span class="bread-slash">/</span>
                                  </li>
                                  <li>
                                    <a title="Salones" href="{{route('salonIndex')}}"><span class="bread-blod">Salones</span></a>
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