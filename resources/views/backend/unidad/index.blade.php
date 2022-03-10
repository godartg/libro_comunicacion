@extends('layouts.backend')

@section('content')

<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                      <h1>LISTA DE UNIDADES 
                        <h4>
                      @if ($datosalon->count())
                      Salon: {{$datosalon[0]->salon_grado}}°{{strtoupper($datosalon[0]->salon_seccion)}} - {{$datosalon[0]->salon_nivel}}
                      <br>Curso: {{$datosalon[0]->curso_nombre}}
                      <br>Material: {{$datosalon[0]->material_titulo}}
                      @else
                       El salon esta desactivado
                      @endif
                      </h4>
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
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="id">N°</th>
                                <th data-field="nombre">Nombre de unidad </th>
                                <th data-field="material">Nombre de Material</th>
                                <th data-field="curso">Curso</th>
                                <th data-field="salon">Salon</th>
                                <th data-field="estado">Estado</th>
                                <th data-field="action">Opciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($unidades as $unidad)
                                <tr>
                                    <td></td>
                                  <td>{{$loop->index+1}}</td>
                                  <td>{{$unidad->nombre}}</td>
                                  <td>{{$unidad->material_titulo}}</td>
                                  <td>{{$unidad->curso_nombre}}</td>
                                  <td>{{$unidad->salon_grado}}°{{strtoupper($unidad->salon_seccion)}}</td>
                                  <td>
                                    @if($unidad->estado)
                                      Activo
                                    @else
                                      Inactivo
                                    @endif
                                  </td>
                                  <td>
                                    <a href="" class="btn btn-primary btn-sm">Editar<i class="fa fa-edit"></i>
                                    <a href="" class="btn btn-primary btn-sm">Actividades <i class="fa fa-edit"></i>
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
                              @if(Auth::user()->hasRole('docente'))
                                  <a href="{{route('unidadCreate',$datosalon[0]->material_id)}}" class="btn btn-primary"><i class="fa fa-user-plus"></i>  Nuevo</a>
                              @endif
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="breadcome-menu">
                                  <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                  </li>
                                  <li><span class="bread-blod">Dashboard V.1</span>
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