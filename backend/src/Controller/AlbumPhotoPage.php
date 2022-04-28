<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\AlbumPhotoService;

#[Route(path: "/api/albums/{id}/photos", name: "album_photo_page")]
class AlbumPhotoPage extends AbstractController
{

    private const DEFAULT_PAGE = 0;
    private const DEFAULT_PHOTOS = 10;

    private SerializerInterface $serializer;
    private AlbumPhotoService $albumService;

    public function __construct(SerializerInterface $serializer, AlbumPhotoService $albumService)
    {
        $this->serializer = $serializer;
        $this->albumService = $albumService;
    }

    /**
     * @param Request $request
     * @param $albumId
     * @return JsonResponse
     */
    public function __invoke(Request $request, $id)
    {
        $page = $request->query->get('page');
        $page = $page == null ? self::DEFAULT_PAGE : $page;

        $photos = $request->query->get('photos');
        $photos = $photos == null ? self::DEFAULT_PHOTOS : $photos;

        $offset = $page * $photos;

        $photos = $this->albumService->getPhotosInAlbum($id, $photos, $offset);

        return new JsonResponse($this->serializer->serialize($photos, JsonEncoder::FORMAT), Response::HTTP_OK, [], true);
    }
}
