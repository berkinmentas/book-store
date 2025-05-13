<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Book extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'title',
        'category',
        'author',
        'publisher',
        'year',
        'page_count',
        'short_description',
        'description',
        'price',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('logo')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, ['image/jpeg', 'image/png', 'image/webp']);
            })
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(600)
                    ->height(600)
                    ->keepOriginalImageFormat()
                    ->quality(90)
                    ->nonQueued();
            });
        $this
            ->addMediaCollection('image')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, ['image/jpeg', 'image/png'], 'image/webp');
            })
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(600)
                    ->height(600)
                    ->keepOriginalImageFormat()
                    ->quality(90)
                    ->nonQueued();
            });

        $this
            ->addMediaCollection('document');

        $this
            ->addMediaCollection('video');
    }
}
