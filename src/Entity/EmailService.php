<?php

namespace App\Entity;

use App\Repository\EmailServiceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmailServiceRepository::class)
 */
class EmailService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function checkEmail(string $email)
    {
        throw new \Exception("Not yet implemented");
    }
}
