<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Uploader
{
    public function __construct(private SluggerInterface $slugger)
    {}
    public function uploadFile(UploadedFile $file, string $folder):string|false
    {
        $original = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safe = $this->slugger->slug($original);
        $new = $safe ."-".uniqid().".".$file->guessExtension();
        try{
            $file->move($folder, $new);
        }catch(FileException $e){
            return false;
        }
        return $new;
    }
}
?>