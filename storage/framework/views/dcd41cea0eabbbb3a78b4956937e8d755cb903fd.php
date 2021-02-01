<?php $__env->startSection("logo"); ?>
    <a href="portal"><img src="img/logo.png" class="w-8 "></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div class="container-fluid ">
        <h1>Listado de usuarios</h1>
        <table id="table_of_users" class="display compact stripe">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>DNI</th>
                <th>Fecha de Nac.</th>
                <th>Lugar de Nac.</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Calle</th>
                <th>Código Postal</th>
                <th>Municipio</th>
                <th>Provincia</th>
                <th>Rol</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            <?php if(isset($datosUsuarios)): ?>
                <?php $__currentLoopData = $datosUsuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datos): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-dark">
                        <td><b><?php echo e($datos->nombre); ?></b></td>
                        <td><b><?php echo e($datos->apellido); ?></b></td>
                        <td><?php echo e($datos->dni); ?></td>
                        <td><?php echo e($datos->fecha_nac); ?></td>
                        <td><?php echo e($datos->lugar_nac); ?></td>
                        <td><b><?php echo e($datos->email); ?></b></td>
                        <td><?php echo e($datos->telefono); ?></td>
                        <td><?php echo e($datos->calle); ?></td>
                        <td><?php echo e($datos->codigo_postal); ?></td>
                        <td><?php echo e($datos->municipio); ?></td>
                        <td><?php echo e($datos->provincia); ?></td>
                        <?php if($datos->rol == 3): ?>
                            <td><b>Solicitante</b></td>
                        <?php elseif($datos->rol == 2): ?>
                            <td><b>Técnico</b></td>
                        <?php elseif($datos->rol == 1): ?>
                            <td><b>Coordinador</b></td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                        <?php if(Session::get('rol') == 1 && Session::get('usuario') != $datos->dni): ?>
                            <td><center><a href="/listadousuarios/<?php echo e($datos->id_usu); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="red" class="bi bi-trash-fill" viewBox="0 0 16 16"><path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/></svg></a></center></td>
                        <?php else: ?>
                            <td><center>-</center></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <br><br><br>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        //var dt = require( 'datatables.net' )();
        $(document).ready(function () {
            $('#table_of_users').DataTable();
        });
        $('#table_of_users').DataTable({
            language: {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "info": "_START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio"
                        },
                        "moment": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No vacio"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "not": "No",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "not": "No",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": "."
            }
        } );
        $('#table_of_userss').DataTable( {
            scrollY: true,
            scroller: {
                rowHeight: 3
            }
        } );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("principal.layouts.estructuraPagina", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/tablaUsuarios.blade.php ENDPATH**/ ?>