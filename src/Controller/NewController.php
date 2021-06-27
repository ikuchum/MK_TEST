<?php


namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;

class NewController
{
    public function newsPage($slug)
    {
        $pdo= new PDO('sqlite:news.db');
        $head= $pdo -> query("SELECT HEAD, TEXT, DAT FROM news WHERE HEAD=$slug");
        $response=$head->fetchAll(PDO::FETCH_ASSOC);


        return new Response($response);
    }

}