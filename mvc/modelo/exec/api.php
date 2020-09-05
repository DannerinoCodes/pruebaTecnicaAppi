<?php
class Api
{

    public static function getPosts($id)
    {
        $url = "https://jsonplaceholder.typicode.com/posts" . $id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url
        ));
        $datos = curl_exec($curl);
        return json_decode($datos, true);
    }


    public static function get_headers_from_curl_response($response)
    {
        $headers = array();

        $header_text = substr($response, 0, strpos($response, "\r\n\r\n"));

        foreach (explode("\r\n", $header_text) as $i => $line)
            if ($i === 0)
                $headers['http_code'] = $line;
            else {
                list($key, $value) = explode(': ', $line);

                $headers[$key] = $value;
            }

        return $headers;
    }

    public static function getPostsPage($page)
    {
        $url = "https://jsonplaceholder.typicode.com/posts?_page=" . $page . "&_limit=7";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url,
            CURLOPT_HEADER => true
        ));
        $datos = curl_exec($curl);
        $headers = self::get_headers_from_curl_response($datos);
        $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
        $body = substr($datos, $header_size);
        $data["link"] = $headers["link"];
        $data["body"] = json_decode($body, true);
        return $data;
    }


    public static function getUsers($id)
    {
        $url = "https://jsonplaceholder.typicode.com/users/" . $id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $datos = curl_exec($curl);
        return json_decode($datos, true);
    }

    public static function getComments($id)
    {
        $url = "https://jsonplaceholder.typicode.com/comments?postId=" . $id;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url
        ));
        $datos = curl_exec($curl);
        return json_decode($datos, true);
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
