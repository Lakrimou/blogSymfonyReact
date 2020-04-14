<?php

namespace App\Document;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ODM\Document(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ODM\Id()
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     */
    private $username;

    /**
     * @ODM\Field(type="string")
     */
    private $password;

    /**
     * @ODM\Fieldtype="string")
     */
    private $name;

    /**
     * @ODM\Field(type="string")
     */
    private $email;

    /**
     * @@ODM\ReferenceMany(targetDocument="App\Document\BlogPost", mappedBy="author")
     */
    private $posts;

    /**
     * @@ODM\ReferenceMany(targetDocument="App\Document\Comment", mappedBy="author")
     */
    private $comments;

    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->comments;
    }


}
