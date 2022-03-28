<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audiencias</title>
    <link rel="icon" href="{{URL::asset('android-icon-192x192.png')}}"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
    <style>
      body {
        font-family: "Arial", sans-serif; font-size: 14px;
      }
      .btn 
      {
        text-align: center;
        font-size: 12px;
      }
      .dropdown-item
      { 
        font-family: 'Arial', sans-serif;
        color:grey;
        font-size: 14px;
        margin: 0px;
      }
      .form-control
      {
        font-family: 'Arial', sans-serif;
        color:grey;
        font-size: 14px;
        margin: 0px;
      }
      .update
      {
        position: fixed;
        top: 0px;
        left: 0px;
        min-height: 100%;
        min-width: 100%;
        background-image: url("https://miro.medium.com/max/1400/1*CsJ05WEGfunYMLGfsT2sXA.gif");
        background-position:center center;
        background-repeat:no-repeat;
        background-color: white;
        z-index: 500 !important;
        opacity: 0.8;
        overflow: hidden;
      }
      .update_modal
      {
        position: fixed;
        top: 0px;
        left: 0px;
        min-height: 100%;
        min-width: 100%;
        background-image: url("https://finacar.com/loading-img-finacar.gif");
        background-position:center center;
        background-repeat:no-repeat;
        background-color: white;
        z-index: 500 !important;
        opacity: 0.8;
        overflow: hidden;
      }
      .footer-basic 
      {
        padding:40px 0;
        background-color:#ffffff;
        color:#4b4c4d;
      }
      .footer-basic .copyright 
      {
        margin-top:15px;
        text-align:center;
        font-size:13px;
        color:#aaa;
        margin-bottom:0;
      }
      .content2 
      {
        margin-left: 10px;
        margin-right: 10px;
      }
   </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <img src="{{URL::asset('/LogodeFiscalia.jpg')}}" alt="Logo" class="rounded float-left" style="max-width: 60px">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/home') }}">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Auciencias
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('monitorio') }}">Monitorio</a>
          <a class="dropdown-item" href="#">Simplificado</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Personalizado</a>
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" id="login_form">
      <button type="submit" class="btn btn-primary"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</button>
    </form>
  </div>
</nav>

<!-- modal -->
<div class="modal fade" id="ModalRegistro">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="datos_form">
        <div class="modal-body">
            @csrf
            <div class="panel-body">
                <div class="card">
                    <div class="card-header"><strong>Registro</strong> Crear / Editar</div>
                    <div class="card-body">
                          <div class="row">
                            <div class="col-md-3">
                              <div class="form-group">
                                  <label>Ruc</label>
                                  <input type="text" class="form-control" id="txt_ruc" placeholder="0000000000-0" maxlength="12" />
                              </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fiscal</label>
                                    <input type="text" class="form-control" id="txt_fiscal" placeholder="JOSE PEREZ" maxlength="50" />
                                </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                  <label>Fiscalía</label>
                                  <select class="form-control" id="cb_fiscalia">
                                    <option value="6">FL Reg. Rancagua</option>
                                    <option value="601">Fl Rancagua</option>
                                    <option value="603">Rengo</option>
                                    <option value="605">San Vicente</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                          <div class=row>
                            <div class="col-md-3">
                              <div class="form-group">
                                  <label>N° Parte</label>
                                  <input type="text" class="form-control" id="txt_nro_parte" placeholder="123456" maxlength="12" />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <label>Fec. Recepción</label>
                              <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="date" id="fec_recepcion" class="form-control" />
                              </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>                                    
          </div>
          <div id="loading_modal" class="update_modal" style="display: none;"></div>
      </form>
    </div>
  </div>
</div>

<!-- content -->
<div class="container">
    <br>
    <div class="form-inline">
      <button type="button" id="BtnNuevo" class="btn btn-success"><i class="fa fa-plus"></i> Agregar</button>
    </div>
    <br>
    <div class="card">
      <div class="card-header">Listado de monitorios</div>
      <div class="card-body">
        <table id="tabla-datos" class="table table-striped table-bordered" width="100%">
          <thead>
              <td>Id</td>
              <td>Ruc</td>
              <td>Fiscal</td>
              <td>Fiscalía</td>
              <td>Fec. Recepción</td>
              <td>N° Parte</td>
              <td style="width:5%;">Opción</td>
          </thead>
      </table>
      </div>
    </div>

    <div id="loading" class="update" style="display: none;"></div>
</div>

<div class="footer-basic">
  <footer>
      <p class="copyright">Mauro Pro © 2022</p>
  </footer>
</div>

<!-- scripts -->
<script>
  $(document).ready(function(){
      //Listar datos
      var table = $('#tabla-datos').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
              dataType: "json",
              contentType: 'application/json; charset=utf-8',
              dataSrc: "data",
              url: "{{ route('datos.obtenertodos') }}",
              beforeSend: function () {
                $("#loading").show();
              },
              complete: function (){
                $("#loading").hide();
              },
              error: function () {
                  console.log("error en ajax");
              }
          },
          columns:[
              {data: 'id'},
              {data: 'ruc'},
              {data: 'fiscal'},
              {data: 'fiscalia'},
              {
                "data": "fec_recepcion",
                "render": function (data) { return moment(data).format('DD/MM/YYYY'); }
              },
              {data: 'nro_parte'},
              {
                "defaultContent":
                    "<button type='button' id='btnEditarRegistro' title='Actualizar registro'><i class='fa fa-pencil-square-o'></i></button>" +
                    "<button type='button' id='btnEliminarRegistro' title='Eliminar registro'><i class='fa fa-trash-o'></i></button>"
              }
          ]
      });

      //Nuevo dato
      $('#BtnNuevo').click(function () {
          $('#ModalRegistro').modal('show')
      });

      //Editar dato
      $('#tabla-datos tbody').on('click', '#btnEditarRegistro', function () {
          var data = table.row($(this).parents('tr')).data();
          var id = data.id;
          console.log("editar id: " + id);
          $("#ModalRegistro").modal('show'); //abro el modal
          $("#btnGuardar").attr("edit-id", id); //pasamos el id al boton.
          $.ajax({
              url:"audiencia/obtener/"+id,
              beforeSend: function () {
                  $("#loading_modal").show();
              },
              complete: function (data) {
                  $("#loading_modal").hide();
              },
              success: function (response) {
                  $("#txt_ruc").val(response["ruc"]);
                  $("#txt_fiscal").val(response["fiscal"]);
                  $("#cb_fiscalia option:selected").text(response["fiscalia"]);
                  $("#txt_nro_parte").val(response["nro_parte"]);
                  $("#fec_recepcion").val(moment(response["fec_recepcion"]).format('yyyy-MM-DD'));
              }
          });
          
      });

      //Eliminar dato
      $('#tabla-datos tbody').on('click', '#btnEliminarRegistro', function () {
          var data = table.row($(this).parents('tr')).data();
          var codigo = data.id;
          console.log("eliminar id: "+codigo);
          alertify.confirm('Eliminar', '¿ Está seguro de eliminar el registro ?', function () {
              $.ajax({
                  url:"audiencia/eliminar/"+codigo,
                  beforeSend: function () {
                      $("#loading").show();
                  },
                  success: function (response) {
                      table.ajax.reload(null, false);
                      toastr.warning('Registro eliminado');
                  },
                  complete: function (data) {
                      //$("#loading").hide();
                  },
                  error: function (data) {
                      alert("Error al eliminar el registro :" + codigo);
                  }
              });
          }, function () {
              alertify.error('Operación cancelada')
          });
      });

      //Guardar dato
      $('#datos_form').submit(function(e){
          var _token = $("input[name=_token]").val();

          var id = $("#btnGuardar").attr("edit-id");
          var ruc = $("#txt_ruc").val();
          var fiscal = $("#txt_fiscal").val();
          var fiscalia = $("#cb_fiscalia option:selected").text();
          var nro_parte = $("#txt_nro_parte").val();
          var fec_recepcion = $("#fec_recepcion").val();
          
          e.preventDefault();

          console.log(nro_parte);

          alertify.confirm('Guardar', '¿ Está seguro de guardar el registro ?', function () {
              $.ajax({
                  type: "POST",
                  url: "{{ route('datos.guardar') }}",
                  data: 
                  {
                    id : id,
                    ruc : ruc,
                    fiscal : fiscal,
                    fiscalia : fiscalia,
                    nro_parte : nro_parte,
                    fec_recepcion : fec_recepcion,
                    _token : _token
                  },
                  beforeSend: function () {
                      $("#loading_modal").show();
                  },
                  success: function (response) {
                      table.ajax.reload(null, false);
                      toastr.success('Registro guardado');
                      $("#btnGuardar").attr("edit-id", 0);
                  },
                  complete: function () {
                      $("#loading_modal").hide();
                      $('#ModalRegistro').modal('hide');
                  },
                  error: function () {
                      alert(response.d);
                  }
              });
          }, function () {
              alertify.error('Operación cancelada')
          });
      });

    //Salir, cerrar sesión
    $('#login_form').submit(function(e){
        e.preventDefault();
        
        alertify.confirm('Sessión', '¿ Está seguro de salir del sistema ?', function () {
            var _token = $("input[name=_token]").val(); 
            console.log(_token);
            $.ajax({
                method: "GET",
                url: "{{ route('auth.logout') }}",
                dataType: "json",
                data: 
                { 
                      _token : _token 
                },
                beforeSend: function () {
                      $("#loading").show();
                },
                success: function (response) {
                      console.log(response.result);
                      if(response.result=="ok")
                      {
                          window.location.href = "/";
                      }
                },
                complete: function () {
                      $("#loading").hide();
                },
                error: function () {
                      alert(response.d);
                }
            });
          }, function () {
              alertify.error('Operación cancelada')
          });
    });
  });
</script>
<link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
</body>
</html>

