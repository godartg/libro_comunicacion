@extends('layouts.backend')

@section('content')
<div class="data-table-area mg-b-15">
  <div class="container-fluid">
    <div class="row ">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="sparkline16-list">
                <div class="sparkline16-hd">
                    <div class="main-sparkline16-hd">
                        <h1>Editar salón</h1>
                    </div>
                </div>
                <div class="sparkline16-graph">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('salonUpdate', $salon->id)}}" method="POST" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                  <label for="docente_id">Docentes</label>
                                  <select data-placeholder="docente_id" class="chosen-select" name="docente_id" tabindex="-1">
                                        @foreach($docentes as $docente)
									        <option value="{{$docente->id}}"
                                            @if( $docente->id == $salon->docente_id)
                                                selected="selected"
                                            @endif
                                            >{{$docente->name.' '.$docente->last_name}}</option>
                                        @endforeach
									</select>
                                </div>
                                <div class="form-group">
                                  <label for="grado">Grado</label>
                                  <select data-placeholder="Grado" class="chosen-select" name="grado" tabindex="-1">
										<option value="1"
                                        @if($salon->grado==1)
                                            selected="selected"
                                        @endif
                                        >Primer grado</option>
										<option value="2"
                                        @if($salon->grado==2)
                                            selected="selected"
                                        @endif
                                        >Segundo grado</option>
                                        <option value="3"
                                        @if($salon->grado==3)
                                            selected="selected"
                                        @endif
                                        >Tercer grado</option>
										<option value="4"
                                        @if($salon->grado==4)
                                            selected="selected"
                                        @endif
                                        >Cuarto grado</option>
                                        <option value="5"
                                        @if($salon->grado==5)
                                            selected="selected"
                                        @endif
                                        >Quinto grado</option>
										<option value="6"
                                        @if($salon->grado==6)
                                            selected="selected"
                                        @endif
                                        >Sexto grado</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="seccion">Sección</label>
                                  <input type="text" name="seccion" class="form-control" placeholder="Seccion" value="{{$salon->seccion}}">
                                </div>
                                <div class="form-group">
                                  <label for="nivel">Nivel</label>
                                  <select data-placeholder="Nivel" class="chosen-select" name="nivel" tabindex="-1">
										<option value="1"
                                        @if($salon->nivel==1)
                                            selected="selected"
                                        @endif
                                        >Primaria</option>
										<option value="2"
                                        @if($salon->nivel==2)
                                            selected="selected"
                                        @endif
                                        >Secundaria</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="estado">Estado</label><br>
                                  <input type="radio" class="form-check-input" id="estado1" name="estado" value="1" 
                                    @if($salon->estado)
                                        checked
                                    @endif
                                  >
                                  <label for="estado1">Activo</label><br>
                                  <input type="radio" class="form-check-input" id="estado2" name="estado" value="0"
                                    @if(!$salon->estado)
                                        checked
                                    @endif
                                  >
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
@endpush

@push('scripts')
    <!-- datapicker JS
	============================================ -->
    <script src="{{ asset('backend/js/datapicker/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('backend/js/datapicker/datepicker-active.js')}}"></script>
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