@extends("principal.layouts.estructuraPagina")
@section("content")

    <h1 class="mt-5">Comprobar Solicitudes</h1>
    <table class="table_of_users" class="display compact stripe">
        <thead>
        <tr>
            <th>Solcitante</th>
            <th>Calle</th>
            <th>Nº</th>
            <th>Piso</th>
            <th>Mano</th>
            <th>Fecha de Creación</th>
            <th>Tipo Edificio</th>
            <th>Tipo Obra</th>
            @if (Session::get('rol') != 2)
                <th>Técnico</th>
            @endif
            <th>Estado</th>
            <th>Abrir</th>
        </tr>
        </thead>
        <tbody class="text-dark">
        @isset($datosSolicitudes)
            @if (Session::get('rol') == 2)

                @foreach ($datosSolicitudes as $datos)
                    @if ($datos->id_tecnico == Session::get('id'))
                        <tr>
                            <td><b>{{ $datos->nombre . " " . $datos->apellido }}</b></td>
                            <td>{{ $datos->calle }}</td>
                            <td>{{ $datos->numero }}</td>
                            <td>{{ $datos->piso }}</td>
                            <td>{{ ucfirst($datos->mano) }}</td>
                            <td><b>{{ $datos->fecha_creacion }}</b></td>
                            <td>{{ ucfirst($datos->tipoedificio) }}</td>
                            <td>{{ ucfirst($datos->tipo) }}</td>
                            <td> -</td>
                            @if ($datos->estado == 'rechazado')
                                <td style="color: red">{{ ucfirst($datos->estado) }}</td>
                            @elseif($datos->estado == 'pendiente')
                                <td style="color: orange">{{ ucfirst($datos->estado) }}</td>
                            @elseif($datos->estado == 'aceptado')
                                <td style="color: blue">{{ ucfirst($datos->estado) }}</td>
                            @else
                                <td style="color: green">{{ ucfirst($datos->estado) }}</td>
                            @endif
                            <td><a href="/solicitud/{{ ucfirst($datos->id_obra) }}">
                                    <button type="button" class="btn btn-outline-primary">Abrir
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                             fill="currentColor"
                                             class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                  d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                            <path fill-rule="evenodd"
                                                  d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                        </svg>
                                    </button>
                                </a></td>
                        </tr>
                    @endif
                @endforeach
            @else
                <?php $i=0; ?>
                @foreach ($datosSolicitudes as $datos)
                    <tr>
                        <td><b>{{ $datos->nombre . " " . $datos->apellido }}</b></td>
                        <td>{{ $datos->calle }}</td>
                        <td>{{ $datos->numero }}</td>
                        <td>{{ $datos->piso }}</td>
                        <td>{{ ucfirst($datos->mano) }}</td>
                        <td><b>{{ $datos->fecha_creacion }}</b></td>
                        <td>{{ ucfirst($datos->tipoedificio) }}</td>
                        <td>{{ ucfirst($datos->tipo) }}</td>
                        <td> {{ ucfirst($tecnicos[$i]) }}</td>
                        @if ($datos->estado == 'rechazado')
                            <td style="color: red">{{ ucfirst($datos->estado) }}</td>
                        @elseif($datos->estado == 'pendiente')
                            <td style="color: orange">{{ ucfirst($datos->estado) }}</td>
                        @elseif($datos->estado == 'aceptado')
                            <td style="color: blue">{{ ucfirst($datos->estado) }}</td>
                        @else
                            <td style="color: green">{{ ucfirst($datos->estado) }}</td>
                        @endif
                        <td><a href="/solicitud/{{ ucfirst($datos->id_obra) }}">
                                <button type="button" class="btn btn-outline-primary">Abrir
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                         fill="currentColor"
                                         class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                                        <path fill-rule="evenodd"
                                              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                                    </svg>
                                </button>
                            </a></td>
                    </tr>
                    <?php $i = $i + 1; ?>
                @endforeach

            @endif
        @endisset
        </tbody>
    </table>
@endsection
@section('scripts')
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        //var dt = require( 'datatables.net' )();
        $(document).ready(function () {
            $('.table_of_users').DataTable();
        });
        $('.table_of_users').DataTable({
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
        });
        $('#table_of_userss').DataTable({
            scrollY: true,
            scroller: {
                rowHeight: 3
            }
        });
    </script>
@endsection
