<?php
class Api
{
    public static function getPost($id)
    {
        $url = "https://jsonplaceholder.typicode.com/posts/" . $id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $datos = curl_exec($curl);
        return $datos;
    }

    public static function getAllPosts()
    {
        $url = "https://jsonplaceholder.typicode.com/posts?_limit=5";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $datos = curl_exec($curl);
        return json_decode($datos, true);
    }


    public static function getUser($id)
    {
        $url = "https://jsonplaceholder.typicode.com/users/" . $id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $datos = curl_exec($curl);
        return $datos;
    }


    public static function getAllUsers()
    {
        $url = "https://jsonplaceholder.typicode.com/users/";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $datos = curl_exec($curl);
        return $datos;
    }



    public static function createPost($data)
    {
        $url = "https://jsonplaceholder.typicode.com/posts/";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://jsonplaceholder.typicode.com/posts',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => http_build_query($data),
            CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=UTF-8'
            )
        ));
        $datos = curl_exec($curl);
        curl_close($curl);
        return $datos;
    }
}
