<p style="text-align: center;"><b>Hola <?php echo e($nombre); ?></b>,</p>
<p style="text-align: center;">
    Tu solicitud de obra ya ha sido creada correctamente, en breve será revisada. Se le informará mediante un correo cuando su solicitud de obra cambie de estado.
</p>
<h5>Información de obra:</h5>

<ul>
    <li>Nombre: <?php echo e($nombre); ?></li>
    <li>Apellidos: <?php echo e($apellido); ?></li>
    <li>DNI: <?php echo e($dni); ?></li>
    <li>Dirección: <?php echo e($direccion); ?></li>
    <li>C.P.: <?php echo e($cp); ?></li>
    <li>Portal: <?php echo e($portal); ?></li>
    <?php if($piso!=null): ?>
    <li>Piso: <?php echo e($piso); ?></li>
    <?php endif; ?>
    <?php if($escalera!=null): ?>
    <li>Escalera: <?php echo e($escalera); ?></li>
    <?php endif; ?>
</ul>
<?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/emails/solicitudCreada.blade.php ENDPATH**/ ?>