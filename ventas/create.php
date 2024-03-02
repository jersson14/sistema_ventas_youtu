<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');
include ('../app/controllers/ventas/listado_de_ventas.php');
include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/clientes/listado_de_clientes.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Ventas</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

                    <div class="row">
                       <div class="col-md-12">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                <?php
                                $contador_de_ventas=0;
                                foreach($ventas_datos as $ventas_dato){
                                    $contador_de_ventas=$contador_de_ventas+1;
                                }
                                ?>
                                   <h3 class="card-title"><i class="fa fa-shopping-bag"></i> Venta N° 
                                   <input type="text" class="form-control" value="<?php echo $contador_de_ventas+1;?>" style="text-align:center"></h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                  <b>Carrito </b>
                                  <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal-buscar_producto">
                                           <i class="fa fa-search"></i>
                                           Buscar producto
                                       </button>
                                       <!-- modal para visualizar datos de los proveedor -->
                                       <div class="modal fade" id="modal-buscar_producto">
                                           <div class="modal-dialog modal-xl">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del producto</h4>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example1" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>Nro</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Código</center></th>
                                                                   <th><center>Categoría</center></th>
                                                                   <th><center>Imagen</center></th>
                                                                   <th><center>Nombre</center></th>
                                                                   <th><center>Descripción</center></th>
                                                                   <th><center>Stock</center></th>
                                                                   <th><center>Precio compra</center></th>
                                                                   <th><center>Precio venta</center></th>
                                                                   <th><center>Fecha compra</center></th>
                                                                   <th><center>Usuario</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                               <?php
                                                               $contador = 0;
                                                               foreach ($productos_datos as $productos_dato){
                                                                   $id_producto = $productos_dato['id_producto']; ?>
                                                                   <tr>
                                                                       <td><?php echo $contador = $contador + 1; ?></td>
                                                                       <td>
                                                                           <button class="btn btn-info" id="btn_selecionar<?php echo $id_producto;?>">
                                                                               Selecionar
                                                                           </button>
                                                                           <script>
                                                                               $('#btn_selecionar<?php echo $id_producto;?>').click(function () {

                                                                                  //alert('<?php echo $id_producto;?>')
                                                                                  var id_producto = "<?php echo $id_producto;?>";
                                                                                  $('#id_producto').val(id_producto);
                                                                                  var producto = "<?php echo $productos_dato['nombre'];?>";
                                                                                  $('#producto').val(producto);
                                                                                  var descripción = "<?php echo $productos_dato['descripcion'];?>";
                                                                                  $('#descripción').val(descripción);
                                                                                  var precio_venta = "<?php echo $productos_dato['precio_venta'];?>";
                                                                                  $('#precio_venta').val(precio_venta);
                                                                                  $('#cantidad').focus();
                                                                                  $('#cantidad').val('1');

                                                                                   //$('#modal-buscar_producto').modal('toggle');

                                                                               });
                                                                           </script>
                                                                       </td>
                                                                       <td><?php echo $productos_dato['codigo'];?></td>
                                                                       <td><?php echo $productos_dato['categoria'];?></td>
                                                                       <td>
                                                                           <img src="<?php echo $URL."/almacen/img_productos/".$productos_dato['imagen'];?>" width="50px" alt="asdf">
                                                                       </td>
                                                                       <td><?php echo $productos_dato['nombre'];?></td>
                                                                       <td><?php echo $productos_dato['descripcion'];?></td>
                                                                       <td><?php echo $productos_dato['stock'];?></td>
                                                                       <td><?php echo $productos_dato['precio_compra'];?></td>
                                                                       <td><?php echo $productos_dato['precio_venta'];?></td>
                                                                       <td><?php echo $productos_dato['fecha_ingreso'];?></td>
                                                                       <td><?php echo $productos_dato['email'];?></td>
                                                                   </tr>
                                                                   <?php
                                                               }
                                                               ?>
                                                               </tbody>
                                                               </tfoot>
                                                           </table><br>
                                                           <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="from-group">
                                                                    <input type="text" id="id_producto" hidden>
                                                                    <label for="">Producto</label>
                                                                    <input type="text" class="form-control" id="producto" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5">
                                                                <div class="from-group">
                                                                    <label for="">Descripción</label>
                                                                    <input type="text" class="form-control" id="descripción" disabled> 
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="from-group">
                                                                    <label for="">Cantidad</label>
                                                                    <input type="number" class="form-control" id="cantidad">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <div class="from-group">
                                                                    <label for="">Precio Venta</label>
                                                                    <input type="text" class="form-control" id="precio_venta" disabled> 
                                                                </div>
                                                            </div>
                        
                                                           </div><br>
                                                           <button style="float:right" id="btn_registrar_carrito" class="btn btn-primary">Registrar</button>
                                                           <div id="respuesta_carrito"></div>
                                                           <script>
                                                            $('#btn_registrar_carrito').click(function(){
                                                                //alert('todo bien');
                                                                var nro_venta = '<?php echo $contador_de_ventas+1;?>';
                                                                var id_producto =$('#id_producto').val();   
                                                                var cantidad =$('#cantidad').val();  
                                                                if(id_producto==""){
                                                                    alert("debe llenar el producto");
                                                                } else if(cantidad==""){
                                                                    alert("debe llenar el dato cantidad");
                                                                }else{
                                                                    var url = "../app/controllers/ventas/registrar_carrito.php";
                                                                    $.get(url,{nro_venta:nro_venta,id_producto:id_producto,cantidad:cantidad},function (datos) {
                                                                        $('#respuesta_carrito').html(datos);
                                                                    });                                                                
                                                                }                                                                    //alert('todo bien');
                                                            });
                                                           </script>
                                                           <br><br>
                                                       </div>
                                                   </div>
                                                   <div id="respuesta_carrito"></div>

                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                       </div>
                                       <br>
                                       <br>
                                       <div class="table-responsive">
                                       <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="background-color:#e7e7e7;text-align:center">Nro</th>
                                                <th style="background-color:#e7e7e7;text-align:center">Producto</th>
                                                <th style="background-color:#e7e7e7;text-align:center">Descripción</th>
                                                <th style="background-color:#e7e7e7;text-align:center">Cantidad</th>
                                                <th style="background-color:#e7e7e7;text-align:center">Precio Unitario</th>
                                                <th style="background-color:#e7e7e7;text-align:center">Precio Subtotal</th>
                                                <th style="background-color:#e7e7e7;text-align:center">Acción</th>

                                            </tr>
                                            
                                        </thead>
                                        <tbody>
                                            <?php
                                            $contador_de_carritos=0;
                                            $cantidad_total=0;
                                            $total_precio_unitario=0;
                                            $total_general=0;
                                            $nro_venta=$contador_de_ventas+1;
                                            $sql_carrito = "SELECT *,al.nombre as nombre_producto, al.descripcion as descripcion_producto, al.precio_venta as precio_venta_producto FROM tb_carrito car inner join tb_almacen al on car.id_producto = al.id_producto WHERE nro_venta='$nro_venta' ORDER BY id_carrito";
                                            $query_carrito = $pdo->prepare($sql_carrito);
                                            $query_carrito->execute();
                                            $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($carrito_datos as $carrito_dato){
                                                $id_carrito=$carrito_dato['id_carrito'];
                                                $contador_de_carritos=$contador_de_carritos+1;
                                                $cantidad_total=$cantidad_total+$carrito_dato['cantidad'];
                                                $total_precio_unitario=$total_precio_unitario+floatval($carrito_dato['precio_venta_producto']);
                                                ?>
                                                <tr>
                                                    <td><center><?php echo $contador_de_carritos;?></center></td>
                                                    <td><center><?php echo $carrito_dato['nombre_producto'];?></center></td>
                                                    <td><center><?php echo $carrito_dato['descripcion_producto'];?></center></td>
                                                    <td><center><?php echo $carrito_dato['cantidad'];?></center></td>
                                                    <td><center><?php echo 'S/ '.$carrito_dato['precio_venta_producto'];?></center></td>
                                                    <td>
                                                        <center>
                                                            <?php 
                                                            $cantidad=floatval($carrito_dato['cantidad']);
                                                            $precio_venta=floatval($carrito_dato['precio_venta_producto']);
                                                            echo 'S/ '.$subtotal=$cantidad*$precio_venta;
                                                            $total_general=$total_general+$subtotal;
                                                            ?>
                                                        </center>
                                                    </td>
                                                    <td>
                                                        <center>
                                                            <form action="../app/controllers/ventas/borrar_carrito.php" method="post">
                                                                    <input type="text" name="id_carrito" value="<?php echo $id_carrito;?>" hidden>
                                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Quitar</button>
                                                            </form>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                           
                                            <tr>
                                                <th colspan="3" style="background-color:#e7e7e7;text-align:right">Total:</th>
                                                <th>
                                                    <center>
                                                    <?php
                                                    echo $cantidad_total;
                                                    ?>
                                                    </center>
                                                </th>
                                                <th>
                                                <center>
                                                    <?php
                                                    echo 'S/ '.$total_precio_unitario;
                                                    ?>
                                                    </center>
                                                </th>
                                                <th style="background-color:#fff819">
                                                <center>   
                                                    <?php
                                                    echo 'S/ '.$total_general;
                                                    ?>
                                                    </center>
                                                </th>

                                            </tr>
                                        </tbody>
                                       </table>

                                       </div>           
                               </div>
                               

                           </div>

                       </div>

                       <div id="respuesta_create"></div>

                   </div>
                   <div class="row">
                       <div class="col-md-9">
                           <div class="card card-outline card-primary">
                               <div class="card-header">
                                   <h3 class="card-title"><i class="fa fa-user-check"></i> Datos del cliente 
                                   </h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                               <b>Clientes </b>
                                  <button type="button" class="btn btn-primary" data-toggle="modal"
                                               data-target="#modal-buscar_cliente">
                                           <i class="fa fa-search"></i>
                                           Buscar cliente
                                       </button>
                                       <!-- modal para visualizar datos de los clientes -->
                                       <div class="modal fade" id="modal-buscar_cliente">
                                           <div class="modal-dialog modal-lg">
                                               <div class="modal-content">
                                                   <div class="modal-header" style="background-color: #1d36b6;color: white">
                                                       <h4 class="modal-title">Busqueda del clientes </h4>
                                                       <div style="width: 10px"></div>
                                                       <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-agregar_cliente">
                                                            <i class="fa fa-users"></i>
                                                            Agregar nuevo cliente
                                                        </button>
                                                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                           <span aria-hidden="true">&times;</span>
                                                       </button>
                                                   </div>
                                                   <div class="modal-body">
                                                       <div class="table table-responsive">
                                                           <table id="example2" class="table table-bordered table-striped table-sm">
                                                               <thead>
                                                               <tr>
                                                                   <th><center>Nro</center></th>
                                                                   <th><center>Selecionar</center></th>
                                                                   <th><center>Nombre del cliente</center></th>
                                                                   <th><center>DNI</center></th>
                                                                   <th><center>Celular</center></th>
                                                                   <th><center>Email</center></th>
                                                               </tr>
                                                               </thead>
                                                               <tbody>
                                                               <?php
                                                               $contador_de_cliente = 0;
                                                               foreach ($clientes_datos as $clientes_dato){
                                                                   $id_cliente = $clientes_dato['id_cliente'];
                                                                   $contador_de_cliente = $contador_de_cliente + 1 ?>
                                                                    <tr>
                                                                        <td><center><?php echo $contador_de_cliente;?></center></td>
                                                                        <td>
                                                                            <center>
                                                                            <button id="id_pasar_cliente<?php echo $id_cliente;?>" class="btn btn-info">Seleccionar</button>
                                                                            <script>[]
                                                                                $('#id_pasar_cliente<?php echo $id_cliente;?>').click(function(){
                                                                                    var id_cliente = '<?php echo $clientes_dato['id_cliente']?>';
                                                                                    $('#id_cliente').val(id_cliente);
                                                                                    var nombre_cliente = '<?php echo $clientes_dato['nombre_cliente']?>';
                                                                                    $('#nombre_cliente').val(nombre_cliente);
                                                                                    var nit_ci_cliente = '<?php echo $clientes_dato['nit_ci_cliente']?>';
                                                                                    $('#dni_cliente').val(nit_ci_cliente);

                                                                                    var celular_cliente = '<?php echo $clientes_dato['celular_cliente']?>';
                                                                                    $('#celular_cliente').val(celular_cliente);

                                                                                    var email_cliente = '<?php echo $clientes_dato['email_cliente']?>';
                                                                                    $('#email_cliente').val(email_cliente);

                                                                                    $('#modal-buscar_cliente').modal('toggle');

                                                                                });
                                                                            </script>

                                                                            </center>
                                                                        </td>
                                                                        <td><center><?php echo $clientes_dato['nombre_cliente'];?></center></td>
                                                                        <td><center><?php echo $clientes_dato['nit_ci_cliente'];?></center></td>
                                                                        <td><center><?php echo $clientes_dato['celular_cliente'];?></center></td>
                                                                        <td><center><?php echo $clientes_dato['email_cliente'];?></center></td>

                                                                    </tr>
                                                                   <?php
                                                               }
                                                               ?>
                                                               </tbody>
                                                               </tfoot>
                                                           </table>                                                           
                                                       </div>
                                                       
                                                   </div>
                                                   <div id="respuesta_carrito"></div>
                                               </div>
                                               <!-- /.modal-content -->
                                           </div>
                                           <!-- /.modal-dialog -->
                                           <br><br>
                                       </div>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" id="id_cliente" hidden>
                                            <label for="">Nombre del cliente</label>
                                            <input type="text" class="form-control" id="nombre_cliente">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">DNI del cliente</label>
                                            <input type="text" class="form-control" id="dni_cliente">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular del cliente</label>
                                            <input type="text" class="form-control" id="celular_cliente">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Email del cliente</label>
                                            <input type="text" class="form-control" id="email_cliente">
                                        </div>
                                    </div>
                                </div>
                                  
                               </div>

                           </div>

                       </div>
                       <div class="col-md-3">
                            <div class="card card-outline card-primary">
                               <div class="card-header">
                                   <h3 class="card-title"><i class="fa fa-shopping-basket"></i> Registrar venta 
                                   </h3>
                                   <div class="card-tools">
                                       <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                           <i class="fas fa-minus"></i>
                                       </button>
                                   </div>

                               </div>

                               <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Monto a cancelar</label>
                                        <input type="text" class="form-control" id="total_a_cancelar" style="text-align:center;background-color:#fff819" value="<?php echo $total_general;?>" disabled>
                                    </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Total pagado</label>
                                                <input type="text" class="form-control" id="total_pagado" style="text-align:center">
                                                <script>
                                                $('#total_pagado').keyup(function(){
                                                    //alert('mensaje');
                                                    var total_a_cancelar=$('#total_a_cancelar').val();
                                                    var total_pagado=$('#total_pagado').val();
                                                    var cambio = parseFloat(total_pagado) - parseFloat(total_a_cancelar);
                                                    
                                                    $('#cambio').val(cambio);
                                                });
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Cambio</label>
                                                <input type="text" class="form-control" id="cambio" style="text-align:center" disabled>
                                            </div> 
                                        </div>
                                       
                                    </div>
                                    <hr>
                                    <div class="form-group" id="btn_guardar_venta">
                                        <button class="btn btn-primary btn-block">
                                            <i class="fa fa-save"></i> Guardar venta
                                        </button>
                                        <script>
                                            $('#btn_guardar_venta').click(function(){
                                                var nro_venta ='<?php echo $contador_de_ventas+1?>';
                                                var id_cliente=$('#id_cliente').val();
                                                var total_a_cancelar=$('#total_a_cancelar').val();
                                                //alert(total_a_cancelar);
                                                if(id_cliente==""){
                                                    alert('Debe llenar los datos del cliente');
                                                }else{
                                                    alert('todo ok');
                                                }
                                            });
                                        </script>
                                    </div>
                               </div>

                           </div>

                       </div>
                       <div id="respuesta_create"></div>

                   </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>



<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 a 0 de 0 Productos",
                "infoFiltered": "(Filtrado de _MAX_ total Productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    $(function () {
        $("#example2").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Clientes",
                "infoFiltered": "(Filtrado de _MAX_ total Clientes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>


<!-- MODAL PARA AGREGAR CLIENTE-->
<div class="modal fade" id="modal-agregar_cliente">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header" style="background-color: #b6900c;color: white">
            <h4 class="modal-title">Nuevo cliente</h4>
            <div style="width: 10px"></div>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="table table-responsive">
                <form action="../app/controllers/clientes/guardar_cliente.php" method="post">
                    <div class="form-group">
                        <label for="">Nombre del cliente</label>
                        <input type="text" class="form-control" name="nombre_cliente">
                    </div>
                    <div class="form-group">
                        <label for="">DNI del cliente</label>
                        <input type="text" class="form-control" name="nit_ci_cliente">
                    </div>
                    <div class="form-group">
                        <label for="">Celular del cliente</label>
                        <input type="text" class="form-control" name="celular_cliente">
                    </div>
                    <div class="form-group">
                        <label for="">Email del cliente</label>
                        <input type="email" class="form-control" name="email_cliente">
                    </div><hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block"><i class="fa fa-save"></i><b> Guardar cliente</b></button>
                    </div>
                </form>                                                
            </div>
            
        </div>
        <div id="respuesta_carrito"></div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>