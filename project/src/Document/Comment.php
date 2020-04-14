<?php

namespace App\Document;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ODM\Document(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     * @ApiProperty(identifier=true)
     */
    private $id;

    /**
     * @ODM\Field(type="string")
     */
    private $content;

    /**
     * @ORM\Field(type="date")
     */
    private $published;

    /**
     * @ODM\ReferenceOne(targetDocument="App\Document\User", inversedBy="comments")
     */
    public $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getPublished(): ?\DateTimeInterface
    {
        return $this->published;
    }

    public function setPublished(\DateTimeInterface $published): self
    {
        $this->published = $published;

        return $this;
    }
}
