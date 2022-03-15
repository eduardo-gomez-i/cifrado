<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desplazamiento</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->

    <div class="login-wrap">
        <div class="login-html">
            <h1>Cifrado por desplazamiento</h1>
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Encriptar</label>
            <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Desencriptar</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="textoEncriptar" class="label">Texto</label>
                        <input id="textoEncriptar" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="numeroEncriptar" class="label">Numero de saltos</label>
                        <input id="numeroEncriptar" type="number" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" onclick="encriptar()" value="Encriptar">
                    </div>
                    <div class="hr"></div>
                    <div class="group">
                        <span id="resultadoEncriptado"></span>
                    </div>
                </div>
                <div class="for-pwd-htm">
                    <div class="group">
                        <label for="textoDesencriptar" class="label">Texto</label>
                        <input id="textoDesencriptar" type="text" class="input">
                    </div>
                    <div class="group">
                        <label for="numeroDesencriptar" class="label">Numero de saltos</label>
                        <input id="numeroDesencriptar" type="number" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" onclick="desencriptar()" value="Desencriptar">
                    </div>
                    <div class="hr"></div>
                    <span id="resultadoDesencriptado"></span>
                </div>
            </div>
        </div>
    </div>

    <script>
        function encriptar() {
            var textoEncriptar = $("#textoEncriptar").val();
            var numeroEncriptar = $("#numeroEncriptar").val();
            $.post("encriptacion.php", {
                texto: textoEncriptar,
                saltos: numeroEncriptar,
                operacion: 1
            }, function(result) {
                $("#resultadoEncriptado").html(result);
            });
        }

        function desencriptar() {
            var textoDesencriptar = $("#textoDesencriptar").val();
            var numeroDesencriptar = $("#numeroDesencriptar").val();
            $.post("encriptacion.php", {
                texto: textoDesencriptar,
                saltos: numeroDesencriptar,
                operacion: 2
            }, function(result) {
                $("#resultadoDesencriptado").html(result);
            });
        }
    </script>

</body>

</html>