@extends('layouts.backend')

@section('content')

<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                        <h1>Salones</h1>
                    </div>
                </div>

                <div class="sparkline13-graph">
                    <div class="datatable-dashv1-list custom-datatable-overright">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        <table id="table_datatable">
                            <thead>
                              <tr>
                                <th data-field="id">ID</th>
                                <th data-field="docente">Docente</th>
                                <th data-field="seccion">Sección</th>
                                <th data-field="grado">Grado</th>
                                <th data-field="nivel">Nivel</th>
                                <th data-field="fecha_nacimiento">Fecha</th>
                                <th data-field="estado">Estado</th>
                                <th data-field="action" id="action">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($salons as $salon)
                                <tr>
                                  <td>{{$loop->index+1}}</td>
                                  <td>{{$salon->name.' '.$salon->last_name}}</td>
                                  <td>{{$salon->seccion}}</td>
                                  <td>{{$salon->grado}}</td>
                                  <td>{{$salon->nivel}}</td>
                                  <td>
                                    {{$salon->fecha_creacion}}
                                  </td>
                                  <td>
                                      @if($salon->estado)
                                        Activo
                                      @else
                                        Desactivo
                                      @endif
                                  </td>
                                  <td>
                                    @if(Auth::user()->isAbleTo('salon-update'))
                                    <a href="{{route('salonEdit', $salon->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    @endif
                                    @if(Auth::user()->isAbleTo('salon-update'))
                                    <a href="{{route('listaAlumnoIndex', $salon->id)}}" class="btn btn-primary btn-sm">Lista de alumnos</a>
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
                                @if(Auth::user()->isAbleTo('salon-create'))
                                  <a href="{{ route('salonCreate', $salon->id) }}" class="btn btn-primary"><i class="fa fa-user-plus"></i>Crear nuevo salon</a>
                                @endif
                              </div>
                          </div>
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                              <ul class="breadcome-menu">
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