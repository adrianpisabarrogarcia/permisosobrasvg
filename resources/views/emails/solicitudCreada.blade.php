<p style="text-align: center;"><b>Hola {{$nombre}}</b>,</p>
<p style="text-align: center;">
    Tu solicitud de obra ya ha sido creada correctamente, en breve será revisada. Se le informará mediante un correo cuando su solicitud de obra cambie de estado.
</p>
<h5>Información de obra:</h5>

<ul>
    <li>Nombre: {{$nombre}}</li>
    <li>Apellidos: {{$apellido}}</li>
    <li>DNI: {{$dni}}</li>
    <li>Dirección: {{$direccion}}</li>
    <li>C.P.: {{$cp}}</li>
    <li>Portal: {{$portal}}</li>
    @if($piso!=null)
    <li>Piso: {{$piso}}</li>
    @endif
    @if($escalera!=null)
    <li>Escalera: {{$escalera}}</li>
    @endif
</ul>
