@extends('layouts.backend')

@section('content')
<div class="product-status mg-b-15">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="product-status-wrap"> 
            <h3>LISTA DE ALTERNATIVAS</h3>
            <h4>
              @if ($datos->count())
              Salon: {{$datos[0]->salon_grado}}°{{strtoupper($datos[0]->salon_seccion)}} - {{$datos[0]->curso_nivel}}
              <br>Curso: {{$datos[0]->curso_nombre}}
              <br>Evaluación: {{$datos[0]->evaluacion_titulo}}
              @else
              El salon esta desactivado
              @endif
            </h4>
            <div class="asset-inner">
              <!--TABLA-->
              <table>
                <tbody>
                  <tr>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id">N°</th>
                    <th data-field="titulo">Detalle de alternativa</th>
                    <th data-field="titulo">Es respuesta</th>
                    <th data-field="titulo">Evaluación</th>
                    <th data-field="titulo">Curso</th>
                    <th data-field="estado">Estado</th>
                    <th data-field="action">Opciones</th>
                  </tr>
                  @foreach($alternativas as $alternativa)
                  <tr>
                    <td></td>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$alternativa->pregunta_detalle}}</td>
                    <td>{{$alternativa->pregunta_respuesta}}</td>
                    <td>{{$alternativa->evaluacion_titulo}}</td>
                    <td>{{$alternativa->curso_nombre}}</td>
                    <td>
                      @if($alternativa->alternativa_estado)
                        Activo
                      @else
                        Inactivo
                      @endif
                    </td>
                    <td>
                      <a href="" class="btn btn-primary btn-sm">Editar<i class="fa fa-edit"></i>
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
                                  <a href="" class="btn btn-primary"><i class="fa fa-user-plus"></i>  Nuevo</a>
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