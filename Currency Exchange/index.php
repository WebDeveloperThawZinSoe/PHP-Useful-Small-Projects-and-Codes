
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exchange API</title>
</head>
<body>
    <form  method="Post">
        <input type="number" placeholder="Enter USD" name="usd" required>
        <br> <br>
        <input type="submit" name="caculate" value="Caculate">
    </form>
</body>
</html>

<hr> 


<?php



if(isset($_POST["caculate"])){
    $data = htmlspecialchars($_POST['usd']);

    function Change($data){
    // Fetching JSON
    $req_url = 'https://v6.exchangerate-api.com/v6/a4b5df148761114226cffb2f/latest/USD';
    $response_json = file_get_contents($req_url);
   
    
    
    // Continuing if we got a result
    if(false !== $response_json) {
    
        // Try/catch for json_decode operation
        try {
    
            // Decoding
            $response = json_decode($response_json);
    
            // Check for success
            if('success' === $response->result) {
    
                // YOUR APPLICATION CODE HERE, e.g.
                $base_price = $data; // Your price in USD

                $EUR_price = round(($base_price * $response->conversion_rates->EUR), 2);

                $MMK_price = round(($base_price * $response->conversion_rates->MMK), 2);

                $Bat_price = round(($base_price * $response->conversion_rates->BHD), 2);
                
                echo  " $data Dollar to  $EUR_price  Europe Pound <br>";
                echo  " $data Dollar to  $MMK_price  Myanmar Kyat <br>";
                echo  " $data Dollar to  $Bat_price  Thia Bahd <br>";
            }
    
        }
        catch(Exception $e) {
            // Handle JSON parse error...
        }
    
    }
    }
    
    change($data);
}




?>





