<?php

namespace App\Service;

use Symfony\Component\Mime\MimeTypes;

/**
 * @author Dawid Góra
 */
class FileService {

    /** @var string */
    //TODO move it to config
    public const FILES_PATH = "C:/Users/kubaczak/Desktop/symfony/backend/zdjecia";
    public const ENDPOINT_PATH = "/photos/";

    /**
     * @param string $base64
     * @return string name of converted file
     */
    public function convertToFile(string $base64): string {
        $fileName = $this->generateFileName();
        $filePath = $this->generateFilePath($fileName);

        $file = fopen($filePath, 'wb');
        fwrite($file, base64_decode($base64));
        fclose($file);

        $fileExt = $this->getFileExt($filePath);
        rename($filePath, $filePath . '.' . $fileExt);

        return self::ENDPOINT_PATH . $fileName . '.' . $fileExt;
    }

    /**
     * @param string $fileName
     * @return string
     */
    private function generateFilePath(string $fileName): string {
        return self::FILES_PATH . '/' . $fileName;
    }

    /**
     * @return string
     */
    private function generateFileName(): string {
        return uniqid("img_", true);
    }

    /**
     * @param string $filePath
     * @return string
     */
    private function getFileExt(string $filePath): string {
        $extensionGuesser = new MimeTypes();

        return $extensionGuesser->getExtensions($extensionGuesser->guessMimeType($filePath))[0];
    }

}