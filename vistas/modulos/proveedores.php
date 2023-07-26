<?php

  if($_SESSION["rol"] != "Administrador" && $_SESSION["rol"] != "Compras"){

      echo '<script>

      window.location = "inicio";
      </script>';

      return;

    }
?>



<!--start wrapper-->
<div class="wrapper">





    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
        <!-- start page content-->
        <div class="page-content" style="margin-bottom: -3%;">

            <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Gestor de proveedores </div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0 align-items-center">
                            <li class="breadcrumb-item"><a href="inicio"><ion-icon name="home-outline"></ion-icon></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Consulta proveedores</li>
                        </ol>

                    </nav>

                </div>

            </div>
            <!--end breadcrumb-->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">

                    <li class="breadcrumb-item active" aria-current="page"><button type="button" class="btn btn-info px-5" style="color: #fff;" data-bs-toggle="modal" data-bs-target="#insertarP"><i class="fadeIn animated bx bx-user-plus"></i>Agregar proveedor</button></li>


                </ol>
            </nav>

            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3"></div>

            </div>

        </div>


        <!-- start page content-->
        <div class="page-content" style="padding: 0.5rem; margin-bottom: -3%;">

            <!--start breadcrumb-->

            <!--end breadcrumb-->

            <hr />
            <h6 class="mb-0 text-uppercase"></h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered TB">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>ATN</th>
                                    <th>Correo electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                $verP = ProveedoresC::VerProveedoresC();
                                ?>
                                <?php
                                //abrimos un foreach con la variable respuesta traiga un echo con lo que tenemos como registros en la tabla
                                foreach ($verP as $key => $value) {
                                    echo '
                        
                                    <tr>
                                        <td>' . $value["nombre_prov"] . '</td>                                        
                                        <td>' . $value["telefono"] . '</td>
                                        <td>' . $value["atn"] . '</td>
                                        <td>' . $value["email"] . '</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" title="Editar proveedor"  class="btn btn-warning  EditarP" Pid="' . $value["id"] . '" data-bs-toggle="modal" data-bs-target="#EditarP"><i class="fadeIn animated bx bx-edit-alt"></i></button>
                                                <button class="btn btn-danger BorrarP" title="Eliminar proveedor" Pid="' . $value["id"] . '"><i class="fadeIn animated bx bx-trash-alt"></i></button>
                                            </div>
                                        </td>

                                    </tr ';
                                }

                                $item = null;
                                $valor = null;

                                // $editarP = ProveedoresC::EProveedoresC($item, $valor);

                                
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
        <!-- end page content-->
    </div>

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><ion-icon name="arrow-up-outline"></ion-icon></a>
    <!--End Back To Top Button-->



    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

</div>



<!-- Modal insertar proveedores -->
<div class="modal fade" id="insertarP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fadeIn animated bx bx-user-plus"></i>
                <h5 class="modal-title">Agregar proveedor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-xl-12 mx-auto">

                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form method="post" role="form" enctype="multipart/form-data" class="row g-3 needs-validation">
                                    <div class="col-md-12">
                                        <label class="form-label">Familia</label>
                                        <input type="text" class="form-control" name="familiaN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Nombre comercial</label>
                                        <input type="text" class="form-control" name="nombreN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Razon social</label>
                                        <input type="text" class="form-control" name="razonsN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">RFC</label>
                                        <input type="text" class="form-control" name="rfcN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Actividad Comercial</label>
                                        <input type="text" class="form-control" name="act_comN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Persona de contacto</label>
                                        <input type="text" class="form-control" name="atnN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Correo eletrónico</label>
                                        <input type="email" class="form-control" name="emailN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Pagina web</label>
                                        <input type="text" class="form-control" name="pag-webN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Teléfono</label>
                                        <input type="text" class="form-control" name="telefonoN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Dirección</label>
                                        <input type="text" class="form-control" name="direccionN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="validationDefault08" class="form-label">Catálogo de servicio</label>
                                        <select class="form-select" name="cat-servicioN" id="validationDefault08" required>
                                            <option selected disabled value="">...</option>
                                            <option>Sí</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Autorización de pago</label>
                                        <input type="text" class="form-control" name="auto-pagoN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Otros</label>
                                        <input type="text" class="form-control" name="otrosN" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>
                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>

                                    <div class="modal-footer">

                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Agregar</button>
                                    </div>
                                    <?php
                                    $crearP = new ProveedoresC();
                                    $crearP->CrearProveedoresC();

                                    ?>

                            </div>
                            </form>
                        </div>
                    </div>




                </div>

            </div>
        </div>
    </div>
</div>
<!-- Fin modal isnertar proveedores -->


<!-- Modal editar proveedores -->
<div class="modal fade" id="EditarP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <i class="fadeIn animated bx bx-user-plus"></i>
                <h5 class="modal-title">Editar proveedores</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <hr />
                    <div class="card">
                        <div class="card-body">
                            <div class="p-4 border rounded">
                                <form method="post" role="form" enctype="multipart/form-data" class="row g-3 needs-validation">

                                    <div class="col-md-12">
                                        <label class="form-label">Familia</label>
                                        <input type="text" class="form-control" name="familiaN" id="familiaN" required>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">Nombre comercial</label>
                                        <input type="text" class="form-control" id="nombreE" name="nombreE" required>
                                        <div class="valid-feedback">Campo relleno correctamente!</div>

                                        <input type="hidden" id="Pid" name="Pid">

                                        <div class="invalid-feedback">Campo requerido, favor de rellenar!</div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Razon social</label>
                                        <input type="text" class="form-control" id="razonsN" name="razonsN" required>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label class="form-label">RFC</label>
                                        <input type="text" class="form-control" id="rfcE" name="rfcE" required>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label">Actividad Comercial</label>
                                        <input type="text" class="form-control" id="act_comN" name="act_comN" required>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Persona de contacto</label>
                                        <input type="text" class="form-control" id="atnE" name="atnE" required>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label class="frm-label">Correo eletrónico</label>
                                        <input type="text" class="form-control" id="emailE" name="emailE" required>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Pagina web</label>
                                        <input type="text" class="form-control" id="pag-webN" name="pag-webN" required>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Teléfono</label>
                                        <input type="text" class="form-control" id="telefonoE" name="telefonoE" required>
                                        
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Direccion</label>
                                        <input type="text" class="form-control" id="direccionE" name="direccionE" required>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label for="validationDefault08" class="form-label">Catálogo de servicio</label>
                                        <select class="form-select" name="cat-servicioE" required>
                                            <option value="" id="cat-servicioE">...</option>
                                            <option>SI</option>
                                            <option>NO</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="frm-label">Autorización de pago</label>
                                        <input type="text" class="form-control" id="auto-pagoN" name="auto-pagoN" required>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label class="frm-label">Otros</label>
                                        <input type="text" class="form-control" id="otrosE" name="otrosE" required>
                                        
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Guardar cambios</button>
                                    </div>

                            </div>

                            </form>

                            <?php

                            $actualizarP = new ProveedoresC();
                            $actualizarP->ActualizarProveedoresC();

                            ?>

                        </div>
                    </div>




                </div>

            </div>
        </div>
    </div>
</div>
</div>
<!--end wrapper-->

<?php
$borrarU = new ProveedoresC();
$borrarU->EliminarProveedorC();

?>