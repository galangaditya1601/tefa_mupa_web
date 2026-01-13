<?php

namespace App\Schemas;

use App\Commons\Schema\BaseSchema;

class GallerSchema extends BaseSchema
{
    private $path;
    private $image;

    /**
     * Return validation rules for galler data.
     */
    protected function rules(): array
    {
        return [
            'image' => 'required|string|max:255',
            'path' => 'required|string',
        ];
    }

    /**
     * Hydrate schema properties from the request body.
     */
    protected function hydrateBody(): static
    {
        $this->setPath($this->body['path'] ?? null)
            ->setImage($this->body['image'] ?? null);
        return $this;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
}
