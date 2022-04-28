<?php

namespace App\Service;

use App\Entity\Photo;
use Doctrine\ORM\EntityManagerInterface;

class AlbumPhotoService
{
    private EntityManagerInterface $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getPhotosInAlbum($albumId, int $items, int $offset): array
    {
        return  $this->entityManager
            ->getRepository(Photo::class)
            ->findBy(criteria: ['album' => $albumId], limit: $items, offset: $offset);
    }
}
