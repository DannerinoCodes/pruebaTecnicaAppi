
 <?php
    //pedir un post en concreto
    /*
    // From URL to get webpage contents. 
    $url = "https://jsonplaceholder.typicode.com/posts/1";

    // Initialize a CURL session. 
    $ch = curl_init();

    // Return Page contents. 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //grab URL and pass it to the variable. 
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);

    echo $result;
*/

    /*
    //pedir todos los posts

       // From URL to get webpage contents. 
    $url = "https://jsonplaceholder.typicode.com/posts";

    // Initialize a CURL session. 
    $ch = curl_init();

    // Return Page contents. 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //grab URL and pass it to the variable. 
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);

    echo $result;
 */

    //pedir todos los usuarios

    // From URL to get webpage contents. 
    $url = "https://jsonplaceholder.typicode.com/users?_limit=5";

    // Initialize a CURL session. 
    $ch = curl_init();

    // Return Page contents. 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    //grab URL and pass it to the variable. 
    curl_setopt($ch, CURLOPT_URL, $url);

    $result = curl_exec($ch);

    echo $result;


/*
    crear un post
    /
    $data = array(
        'title' => 'Dannerino',
        'body' => 'Esta es una prueba para mi aplicacioncilla',
        'userId' => 500
    );

    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => http_build_query($data),
        CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=UTF-8'
        )
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);

    // Close request to clear up some resources
    curl_close($curl);

    echo ($resp);

    ?>
*/