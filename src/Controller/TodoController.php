<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

class TodoController extends AbstractController
{
    public function addItem() {

        $todos = array(); // All todos in DB
        
        if (count($todos) == 10) {
            throw new \Exception('There is already 10 items !');
        }
        $exist = array(); // Request to verify if todos name exist in db
        if ($exist) {
            throw new \Exception('This todo name already exist !');
        }
        if (!$this->content || strlen($this->content) > 1000) {
            throw new \Exception('Content does not exist or too long !');
        }
    }
}
