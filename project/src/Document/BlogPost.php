<?php

namespace App\Document;

use ApiPlatform\Core\Annotation\ApiProperty;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource
 * @ODM\Document(repositoryClass="App\Repository\BlogPostRepository")
 */
class BlogPost
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     * @ApiProperty(identifier=true)
     */
    public $id;

    /**
     * @ODM\Field(type="string")
     * @Assert\NotBlank()
     */
    public $title;

    /**
     * @ODM\Field(type="date")
     */
    public $published;

    /**
     * @ODM\Field(type="string")
     */
    public $content;

    /**
     * @ODM\ReferenceOne(targetDocument="App\Document\User", inversedBy="posts")
     */
    public $author;

    /**
     * @ODM\Field(type="string")
     */
    public $slug;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug($slug): self
    {
        $this->slug = $slug;
        return $this;
    }
}
