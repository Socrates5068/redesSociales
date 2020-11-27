{{-- <?php
    //$fields = array('field1' => 'valor1', 'field2' => urlencode('valor 2'));
    $fields = "Esto es una prueba";
    //$fields_string = http_build_query($fields);
    $token = "EAAJlNVhYjRMBABGWlmIQrjab0aDEqsVBwaffdW5U4INWN8JWyO2riBu4NbiTeUZCkZBX2nBCzpnJlOZA6ENy6y1jPDMD6nY2RmTO1IrWvBvFmc9xdn8ZBGY0AWF6awwZAIhF2SccvWGvzMahowyApMTsTFbHg4CZBcvggMfZAllOSh5JwKGisqTOyJHcYToeB0ZD";
    $url = "?message=".$fields."&access_token=".$token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/103785118245947/feed");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    //echo "https://graph.facebook.com/IngenieriaDeSistemasPotosi/feed"."?message=".$fields."&access_token=".$token;
    echo "<br><br>".$url;
    //IngenieriaDeSistemasPotosi/feed?message=Hello World!&access_token=EAAJlNVhYjRMBAJZCMIHHZCwcay1vQHpN3PsKQvKjfy9yUsl1SINrEYjaIYdyv41PYiDP3ri5DN9H3juhl5qnSQjs3YeqoMA7gRjGCdl3mkZAFHUB7DO9WOpjO7caUnPY26UlZAtyk1HR8D5LU9TMheZAxdyXqHS8Kc33ie8JtrRUPA7UTo1E9QpbNulagOd8MPuMIxLsByy9ZASSET4vpirZCgliXufKSNGAWOjOLXctZBBtl3X2gQ0KEeH46pPQvjoZD

?> --}}
{{--     @if(Auth::check())
        @if (Auth::user()->isAdmin())
            <h2>Admin user enter code here<h2>
        @else
            <h2>Solo los administradores tienen acceso aqui :)<h2>
        @endif
    @endif --}}

{{-- <?php

echo public_path();
echo "<br>";
echo url('/'.'social/public');

?> --}}

{{-- Telegram pruebas --}}

{{-- <?php

require_once "../vendor/autoload.php";

$bot = new \TelegramBot\Api\BotApi('1411157049:AAFKE0FnIRvOS_h8vkJoyhceiUctiaLE33c');

$bot->sendMessage("-426827268", "Prueba");


?> --}}