<p style="text-align: center;"><b>Bienvenido/a <?php echo e($nombre); ?></b> a la plataforma del Ayuntamiento de Vitoria-Gasteiz para
    solicitar permisos de obras.</p>


<p style="text-align: center;">
Recuerda que puedes pedir tu permiso en: <a href="https://permisosobrasvg.herokuapp.com/" target="_blank">https://permisosobrasvg.herokuapp.com/</a>

<br>
Nos hemos permitido enviarte los <b>datos de tu sesión</b> en nuestro portal:
</p>
<ul>
    <li>Nombre: <?php echo e($nombre); ?></li>
    <li>Apellidos: <?php echo e($apellidos); ?></li>
    <li>DNI: <?php echo e($dni); ?></li>
    <li>Fecha de Nacimiento: <?php echo e($fecha_nac); ?></li>
    <li>Lugar de Nacimiento: <?php echo e($lugar_nac); ?></li>
    <li>Dirección: <?php echo e($calle); ?></li>
    <li>Municipio: <?php echo e($municipio); ?></li>
    <li>C.P.: <?php echo e($codigopostal); ?></li>
    <li>Email: <?php echo e($email); ?></li>
    <li>Teléfono: <?php echo e($telefono); ?></li>
</ul>

<?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/emails/register.blade.php ENDPATH**/ ?>