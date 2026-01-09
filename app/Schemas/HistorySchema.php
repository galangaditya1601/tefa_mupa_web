<?php

namespace App\Schemas;

use App\Commons\Schema\BaseSchema;

class HistorySchema extends BaseSchema
{
    private $title;
    public $body; // 'body' should match or be less restrictive than parent visibility
    private $path;
    private $image;

    protected function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'path' => 'required|string',
            'image' => 'required|string|max:255',
        ];
    }

    public function hydrateBody()
    {
        $this->setTitle($this->body['title'] ?? null)
             ->setBody($this->body['body'] ?? null)
             ->setPath($this->body['path'] ?? null)
             ->setImage($this->body['image'] ?? null);
    }

    // Title
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    // Body
    public function getBody()
    {
        return $this->body;
    }
    public function setBody($body)
    {
        $this->body = $body;
        return $this;
    }

    // Path
    public function getPath()
    {
        return $this->path;
    }
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    // Image
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
