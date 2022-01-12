<?php

namespace App\Controller;

use App\Entity\Todo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class UserController extends AbstractController
{

    public function addTodo($todo) {

        $todo = new Todo($todo);

        //$user = new User();


        if (!empty($this->todo)) {
            throw new \Exception('This todo exist !');
        }else{
            throw new \Exception('This todo does not exist !');
        }
    }
}
