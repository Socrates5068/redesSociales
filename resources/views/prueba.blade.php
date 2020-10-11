{{-- <?php
    //$fields = array('field1' => 'valor1', 'field2' => urlencode('valor 2'));
    $fields = "Esto es una prueba";
    //$fields_string = http_build_query($fields);
    $token = "EAAJuZBNenZA6MBAHkrKvVLZArq1sZCgjQQlILzKN2ATM74PmsP2RHoYmCwNkhsD6MmymJ41JJfX6iQRtqmrjNLdFW7zefKnFlKHM8yXZBZAZAqkIgRuNQhm2au4T3GUw5Gp2iCFpLRIHzc0dEyYxRTCWeBNOrhH67BEvlTA77GrXwZDZD";
    $url = "?message=".$fields."&access_token=".$token;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/IngenieriaDeSistemasPotosi/feed");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $url);
    $data = curl_exec($ch);
    curl_close($ch);
    //echo "https://graph.facebook.com/IngenieriaDeSistemasPotosi/feed"."?message=".$fields."&access_token=".$token;
    echo "<br><br>".$url;
?> --}}
{{--     @if(Auth::check())
        @if (Auth::user()->isAdmin())
            <h2>Admin user enter code here<h2>
        @else
            <h2>Solo los administradores tienen acceso aqui :)<h2>
        @endif
    @endif --}}
