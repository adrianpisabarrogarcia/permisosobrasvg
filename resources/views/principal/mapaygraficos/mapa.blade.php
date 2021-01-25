<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mapa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 100px
        }

        body {
            background-color: #E0E0E0
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <form class="col-12" method="POST" action="{{ route("mapa.insert") }}">
                @csrf
                <!--To use the full functionality visit https://www.algolia.com-->
                <input type="search" id="address" class="form-control" placeholder="Where are we going?" name="dir"/>
                <input type="hidden" id="lat" value="" name="lat"/>
                <input type="hidden" id="lng" value="" name="lng"/>

                <br />

                <button type="submit" name="Enviar" id="Enviar">Enviar</button>
            </form>
            <br />
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.16.4"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="/js/mapa.js"></script>
</body>
</html>
