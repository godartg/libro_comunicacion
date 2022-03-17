@extends('layouts.backend')

@section('content')
<div class="product-status mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="product-status-wrap"> 
            <h3>LISTA DE ACTIVIDADES</h3>
            <h4>
              @if ($datos->count())
              Salon: {{$datos[0]->salon_grado}}°{{strtoupper($datos[0]->salon_seccion)}} - {{$datos[0]->curso_nivel}}
              <br>Curso: {{$datos[0]->curso_nombre}}
              <br>Material: {{$datos[0]->material_titulo}}
              <br>Unidad: {{$datos[0]->unidad_nombre}}
              @else
              El salon esta desactivado
              @endif
            </h4>
            <div class="add-product"><a href="{{route('actividadCreate',$datos[0]->unidad_id)}}">Nueva Actividad</a></div>
            <div class="asset-inner">
              <!--TABLA-->
              <table id="table_datatable">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>N° Actividad</th>
                    <th>Detalle de actividad</th>
                    <th>Página</th>
                    <th>Detalle de ayuda</th>
                    <th>Material</th>
                    <th>Curso</th>
                    <th>Unidad</th>
                    <th>Docente</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
                <tbody >
                  @foreach($actividades as $actividad)
                    <tr>
                      <td>{{$loop->index+1}}</td>
                      <td>falta agregar N° de Act </td>
                      <td>{{$actividad->actividad_detalle}}</td>
                      <td>{{$actividad->actividad_pagina}}</td>
                      <td>{{$actividad->actividad_ayuda}}</td>
                      <td>{{$actividad->material_titulo}}</td>
                      <td>{{$actividad->curso_nombre}}</td>
                      <td>{{$actividad->unidad_nombre}}</td>
                      <td>{{$actividad->usuario_nombre}} {{$actividad->usuario_apellidos}}</td>
                      <td>
                        @if($actividad->actividad_estado)
                          Activo
                        @else
                          Inactivo Activo
                        @endif
                      </td>
                      <td>
                        <a href="{{route('actividadEdit', $actividad->actividad_id)}}" class="btn btn-primary btn-sm">Editar <i class="fa fa-edit"></i>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!--END TABLA-->                          
            </div>          
            <div class="custom-pagination">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
              </ul>
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
  <link rel="stylesheet" href="{{ asset('backend/css/jquery.dataTables.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/css/buttons.dataTables.min.css')}}">
@endpush

@push('scripts')
    <!-- data table JS
		============================================ -->
    <script src="{{ asset('backend/js/datatable/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('backend/js/datatable/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('backend/js/datatable/jszip.min.js')}}"></script>
    <script src="{{ asset('backend/js/datatable/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('backend/js/datatable/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('backend/js/datatable/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('backend/js/datatable/buttons.colVis.min.js')}}"></script>
    <script>
    $(document).ready(function() {
        $('#table_datatable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                      columns: ':visible(:not(:last-child))'
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                      columns: ':visible(:not(:last-child))'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                      columns: ':visible(:not(:last-child))'
                    }
                },
                'colvis'
            ]
        } );
    } );
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
                                @if(Auth::user()->isAbleTo('user-create'))
                                  <a href="{{ route('usuarioCreate') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i>Crear nuevo usuario</a>
                                @endif
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="breadcome-menu">
                                  <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                  </li>
                                  <li><span class="bread-blod">Dashboard V.1</span>
                                  <li>
                                    <a href="{{route('home')}}">Home</a> <span class="bread-slash">/</span>
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