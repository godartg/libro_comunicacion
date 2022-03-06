@extends('layouts.backend')

@section('content')

<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline13-list">
                <div class="sparkline13-hd">
                    <div class="main-sparkline13-hd">
                        <h1>Projects <span class="table-project-n">Data</span> Table</h1>
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
                                <th data-field="id">ID</th>
                                <th data-field="name">Nombre</th>
                                <th data-field="last-name">Apellido</th>
                                <th data-field="email">Correo</th>
                                <th data-field="dni">DNI</th>
                                <th data-field="fecha_nacimiento">Fecha de nacimiento</th>
                                <th data-field="sexo">Sexo</th>
                                <th data-field="created_at">Creado en</th>
                                <th data-field="action">Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($users as $user)
                                <tr>
                                    <td></td>
                                  <td>{{$loop->index+1}}</td>
                                  <td>{{$user->name}}</td>
                                  <td>{{$user->last_name}}</td>
                                  <td>{{$user->email}}</td>
                                  <td>{{$user->dni}}</td>
                                  <td>{{$user->fecha_nacimiento}}</td>
                                  <td>
                                    @if($user->sexo)
                                      Hombre
                                    @else
                                      Mujer
                                    @endif
                                  </td>
                                  <td>{{$user->created_at}}</td>
                                  <td>
                                    @if(Auth::user()->isAbleTo('user-update'))
                                    <a href="{{route('usuarioEdit', $user->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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