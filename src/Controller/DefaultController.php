<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DefaultController
{
    public function newsList()
    {
        $pdo = new PDO('sqlite:news.db');
        $head = $pdo->query("SELECT HEAD FROM news");
        $response = $head->fetchAll(PDO::FETCH_ASSOC);

        return new Response($response);
    }

}
