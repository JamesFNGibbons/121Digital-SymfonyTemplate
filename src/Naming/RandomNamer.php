<?php

namespace App\Naming;

use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\NamerInterface;
use Vich\UploaderBundle\Naming\ConfigurableInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class RandomNamer implements NamerInterface, ConfigurableInterface
{
    private int $length = 32;

    public function configure(array $options): void
    {
        if (isset($options['length'])) {
            $this->length = (int) $options['length'];
        }
    }

    public function name($object, PropertyMapping $mapping): string
    {
        $file = $mapping->getFile($object);
        
        if (!$file instanceof UploadedFile) {
            return $this->generateRandomName() . $this->getExtension($file);
        }

        $extension = $this->getExtension($file);
        $name = $this->generateRandomName();
        
        return $name . $extension;
    }

    private function generateRandomName(): string
    {
        return bin2hex(random_bytes($this->length / 2));
    }

    private function getExtension($file): string
    {
        $originalName = $file->getClientOriginalName();
        $extension = pathinfo($originalName, PATHINFO_EXTENSION);
        
        return $extension ? '.' . $extension : '';
    }
}

