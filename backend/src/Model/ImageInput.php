<?php

namespace App\Model;

use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Album;

class ImageInput
{

    #[Assert\NotBlank]
    private $imageContent;

    #[Assert\NotBlank]
    private $likes;

    #[Assert\NotBlank]
    private $dislikes;

    #[Assert\NotBlank]
    private $views;

    #[Assert\NotBlank]
    private $title;

    #[Assert\NotBlank]
    private $description;

    #[Assert\NotBlank]
    private $location;

    #[Assert\NotBlank]
    private $album;


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageContent()
    {
        return $this->imageContent;
    }

    public function setImageContent($imageContent)
    {
        $this->imageContent = $imageContent;
        return $this;
    }

    public function getLikes(): ?int
    {
        return $this->likes;
    }

    public function setLikes(int $likes): self
    {
        $this->likes = $likes;

        return $this;
    }

    public function getDislikes(): ?int
    {
        return $this->dislikes;
    }

    public function setDislikes(int $dislikes): self
    {
        $this->dislikes = $dislikes;

        return $this;
    }

    public function getViews(): ?int
    {
        return $this->views;
    }

    public function setViews(int $views): self
    {
        $this->views = $views;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getAlbumId(): ?Album
    {
        return $this->album;
    }

    public function setAlbumId(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }
}
