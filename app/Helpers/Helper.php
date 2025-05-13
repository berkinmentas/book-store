<?php


namespace App\Helpers;


use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\File;

class Helper
{
    public static function handleUploadedSingleFile(Book $model, array $document, string $collection, array $withCustomProperties = []): void
    {
        try {
            $pathSource = storage_path('app/documents_tmp/' . $document['filename']);

            $model->addMedia($pathSource)
                ->usingName($document['title'])
                ->withCustomProperties($withCustomProperties)
                ->toMediaCollection($collection);
        } catch (\Exception|\Throwable $exception) {
            throw new Exception($exception->getMessage());
        }
    }
    public static function handleUploadedDocuments($model, array $document, array $withCustomProperties = [], string $collection = ''): void
    {
        try {
            $pathSource = storage_path('app/documents_tmp/' . $document['filename']);

            if (empty($collection)) {
                $mimeType = explode('/', File::mimeType($pathSource));
                $collection = 'document';
                if ($mimeType[0] === 'image')
                    $collection = 'image';
                elseif ($mimeType[0] === 'video')
                    $collection = 'video';
            }

            $model->addMedia($pathSource)
                ->usingName($document['title'])
                ->withCustomProperties($withCustomProperties)
                ->toMediaCollection($collection);
        } catch (\Exception|\Throwable $exception) {
            throw new \Exception($exception->getMessage());
        }
    }
}
