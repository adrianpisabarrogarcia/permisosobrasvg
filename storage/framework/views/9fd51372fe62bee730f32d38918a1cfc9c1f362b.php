<?php $__env->startSection("archivosCSS"); ?>
    <link href="/css/principal.css" rel="stylesheet" />
    <link href="/css/Principal/claro.css" rel="stylesheet" class="theme"/>
    <link rel="stylesheet" href="../../froala-editor/css/froala_editor.pkgd.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection("logo"); ?>
    <a href="portal"><img src="img/logo.png" class="w-8 "></a>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

        <div class="container  card flex-column align-items-center justify-content-center p-0">
            <div class="card-header w-100 bg-primary border-1">
                <h1 class="font-weight-light  text-center text-white">Contacto</h1>
            </div>
            <div class="card-body">
                <div>
                    <div class="card border-0 bg-transparent m-auto w-75">
                        <span class="w-100">En caso de tener alguna duda sobre el funcionamiento de nuestra web o de la metodología de la empresa contacta con nosotros.<br><br></span>
                        <span class="w-100">Rellena el formulario que se muestra a continuación:</span><br>
                        <!--<div class="card-body"><canvas id="myBarChart" width="100%" height="20"></canvas></div>-->
                    </div>
                </div>
                <div class=" h-25 w-75 m-auto pb-5 ">
                    <form action="" method="post" class="d-flex flex-column border-4 w-100">
                        <?php echo csrf_field(); ?>
                        <div class="w-100 d-flex flex-column align-items-center ml-5">
                            <label for="name"><h3 class="font-weight-normal text-dark">Nombre</h3></label>
                            <input type="text" id="name" name="name" required class="w-100 border-1 text-center" value="<?php echo e($nombre); ?>" disabled ><br>
                            <label for="email" ><h3 class="font-weight-normal text-dark">Correo electrónico</h3></label>
                            <input type="email" name="email" id="email" required class="w-100 border-1 text-center" value="<?php echo e($email); ?>"disabled><br>
                            <label for="mensaje" ><h3 class="font-weight-normal text-dark">Mensaje</h3></label>
                        </div>

                        <div style="width: 50% !important;">
                            <textarea id="froala-editor" name="mensaje"></textarea>
                        </div>
                        <button class="rounded bg-primary table-bordered border-secondary  w-100 p-2 mt-3 ml-5 text-white">Enviar mensaje</button>
                    </form>
                </div>
            </div>
        </div>


<?php $__env->stopSection(); ?>

<!-- plugin de editor de js -->
<?php $__env->startSection("scripts"); ?>
    <script type="text/javascript" src="../froala-editor/js/froala_editor.pkgd.js"></script>

    <script>
        new FroalaEditor('textarea#froala-editor', {
            documentReady: true,
            iframe: true,
            iframeStyle: 'body{width:auto;font-family:"Helvetica Neue", Arial, sans-serif;background-color: white;}pre{width:auto;font-family:"Helvetica Neue", Arial, sans-serif;}',
            heightMin: 300,
            heightMax: 300,
            width: '100',
            placeholderText: 'Inserta aquí tu mensaje:',
            "key": "INSERT-YOUR-FROALA-KEY-HERE",
            "events": {},
            "toolbarButtons": {
                "moreText": {
                    "buttons": [
                        "bold",
                        "italic",
                        "underline",
                        "strikeThrough",
                        "subscript",
                        "superscript",
                        "fontFamily",
                        "fontSize",
                        "textColor",
                        "backgroundColor",
                        "clearFormatting"
                    ],
                    "buttonsVisible": 3,
                    "align": "left"
                },
                "moreParagraph": {
                    "buttons": [
                        "formatOLSimple",
                        "formatOL",
                        "formatUL",
                        "outdent",
                        "indent"
                    ],
                    "buttonsVisible": 3,
                    "align": "left"
                },
                "undefined": {
                    "buttons": [],
                    "buttonsVisible": 0,
                    "align": "left"
                },
                "moreMisc": {
                    "buttons": [
                        "undo",
                        "redo",
                        "fullscreen",
                        "selectAll"
                    ],
                    "buttonsVisible": 2,
                    "align": "right"
                },
                "showMoreButtons": true
            },
            "language": "es"
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("principal.layouts.estructuraPagina", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vagrant/code/permisosobrasvg/resources/views/principal/usuarios/contacto.blade.php ENDPATH**/ ?>