<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class GambarUploadService
{
    public function store(UploadedFile $file, string $folder, ?string $basename = null): string
    {
        $directory = public_path("assets/images/{$folder}");

        if (! File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $extension = $file->getClientOriginalExtension() ?: $file->extension() ?: 'jpg';
        $filename = ($basename ? Str::slug($basename) : Str::uuid()->toString()).'.'.strtolower($extension);

        $file->move($directory, $filename);

        return "assets/images/{$folder}/{$filename}";
    }

    public function delete(?string $path): void
    {
        if (! $path) {
            return;
        }

        $fullPath = public_path($path);

        if (File::isFile($fullPath)) {
            File::delete($fullPath);
        }
    }
}
