<?php

namespace App\Schemas\Auth;

use App\Commons\Schema\BaseSchema;

class SliderSchema extends BaseSchema {
    private $title;
    private $file;
    private $path;

    protected function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    protected function hydrateBody(): static
    {
        $title = $this->body['title'] ?? null;
        $file = $this->body['file'] ?? null;
        $path = $this->body['path'] ?? null;
        $this->setTitle($title)
            ->setFile($file)
            ->setPath($path);
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath($path): self
    {
        $this->path = $path;
        return $this;
    }

    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file): self
    {
        $this->file = $file;
        return $this;
    }
}
