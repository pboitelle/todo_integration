<?php

namespace App\Entity;

use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @Assert\DateTime
     */
    private $birthday;

    /**
     * @ORM\OneToOne(targetEntity=Todo::class, mappedBy="relation", cascade={"persist", "remove"})
     */
    private $todo;

    public function __construct($email, $lastname, $firstname, $birthday, $password) {
        $this->email     = $email;
        $this->lastname  = $lastname;
        $this->firstname = $firstname;
        $this->birthday = new \DateTime($birthday);
        $this->password  = $password;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTime $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getTodo(): ?Todo
    {
        return $this->todo;
    }

    public function setTodo(Todo $todo): self
    {
        // set the owning side of the relation if necessary
        if ($todo->getRelation() !== $this) {
            $todo->setRelation($this);
        }

        $this->todo = $todo;

        return $this;
    }


    public function isValid()
    {
        $date = new \DateTime('NOW');

        $diff = date_diff($date, $this->birthday);


        //$mail = new EmailService();
        //$mail->checkEmail($this->email);

        if (!$diff || $diff->y < 13) {
            return false;
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        if (!$this->email || strlen($this->email) == 0) {
            return false;
        }
        if (!$this->lastname || strlen($this->lastname) == 0) {
            return false;
        }
        if (!$this->firstname || strlen($this->firstname) == 0) {
            return false;
        }
        if (!$this->password || strlen($this->password) < 8 || strlen($this->password) > 40) {
            return false;
        }
        return true;
    }
}