<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSA</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->

    <div class="login-wrap2">
        <div class="login-html">
            <h1>Cifrado por RSA</h1>
            <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Encriptar</label>
            <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Desencriptar</label>
            <div class="login-form">
                <div class="sign-in-htm">
                    <div class="group">
                        <label for="textoEncriptar" class="label">clave publica</label>
                        <textarea name="publica" id="publica" cols="70" rows="3"></textarea>
                    </div>
                    <div class="group">
                        <label for="textoEncriptar" class="label">clave privada</label>
                        <textarea name="privada" id="privada" cols="70" rows="3"></textarea>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" onclick="getClaves()" value="Obtener claves">
                    </div>
                    <div class="group">
                        <label for="textoEncriptar" class="label">Texto a encriptar</label>
                        <input id="textoEncriptar" type="text" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" onclick="encriptar()" value="Encriptar">
                    </div>
                    <hr>
                    <div class="group">
                        <h3>el resultado de la encriptacion es:</h3>
                        <textarea id="resultadoEncriptado" cols="70" rows="3" readonly></textarea>
                    </div>
                </div>
                <div class="for-pwd-htm">
                    <div class="group">
                        <label for="textoDesencriptar" class="label">Texto</label>
                        <input id="textoDesencriptar" type="text" class="input">
                    </div>
                    <div class="group">
                        <input type="submit" class="button" onclick="desencriptar()" value="Desencriptar">
                    </div>
                    <hr>
                    <div class="group">
                        <h3>el resultado de la desenciptacion es:</h3>
                        <textarea id="resultadoDesencriptado" cols="70" rows="3" readonly></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function encriptar() {
            var textoEncriptar = $("#textoEncriptar").val();
            $.post("RSA.php", {
                texto: textoEncriptar,
                operacion: 1
            }, function(result) {
                $("#resultadoEncriptado").val(result);
            });
        }

        function getClaves() {
            var textoEncriptar = $("#textoEncriptar").val();
            let contexto = this;
            $.post("RSA.php", {
                texto: textoEncriptar,
                operacion: 3
            }, function(result) {
                contexto.publica = result[1];
                $("#privada").val(result[0]);
                $("#publica").val(result[1]);
                document.getElementById("publica").readOnly = true;
                document.getElementById("privada").readOnly = true;
            }, "json");
        }

        function desencriptar() {
            var textoDesencriptar = $("#textoDesencriptar").val();
            $.post("RSA.php", {
                texto: textoDesencriptar,
                operacion: 2
            }, function(result) {
                $("#resultadoDesencriptado").val(result);
            });
        }
    </script>

</body>

</html>