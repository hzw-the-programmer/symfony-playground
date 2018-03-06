<?php

namespace App\Controller;

use Doctrine\DBAL\Driver\Connection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PlaceController extends Controller
{
    public function index($id, Connection $connection)
    {
        $places = $connection->fetchAll('SELECT * FROM places');
        return $this->json($places);
    }
}
