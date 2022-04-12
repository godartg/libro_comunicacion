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
              <br>Pregunta: {{$datos[0]->pregunta_detalle}}
              @else
              El salon esta desactivado
              @endif
            </h4>
            <div class="asset-inner">
              <!--TABLA-->
              <table id="table_datatable">
                <thead>
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
                </thead>
                <tbody>
                  @foreach($alternativas as $alternativa)
                  <tr>
                    <td></td>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$alternativa->alternativa_detalle}}</td>
                    <td>
                      @if($alternativa->alternativa_respuesta)
                        <span class="pd-setting">Si</span>
                      @else
                        <span class="ds-setting">No</span>
                      @endif
                    </td>
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
                      <a href="{{route('alternativaEdit', $alternativa->alternativa_id)}}" class="btn btn-primary btn-sm">Editar<i class="fa fa-edit"></i>
                    </td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
              <!--END TABLA-->                          
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
                                @if(Auth::user()->hasRole('docente'))
                                  <a href="{{route('alternativaCreate',$datos[0]->pregunta_id)}}" class="btn btn-primary"><i class="fa fa-user-plus"></i>  Nuevo</a>
                                @endif
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="breadcome-menu">
                                  <li><a href="{{route('home')}}">Home</a></span>
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