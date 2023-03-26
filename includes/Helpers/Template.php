<?php

declare(strict_types=1);

namespace MRH\PostExcerpt\Helpers;

class Template
{
    public static function render(string $filePath, array $data = []): void
    {
        if (file_exists($filePath)) {
            extract($data);
            require $filePath;
        } else {
            throw new \RuntimeException('View file not found');
        }
    }
}
