<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'category' => [
                'id' => $this->category->id ?? null,
                'title' => $this->category->title ?? null,
            ],
            'banner_image' => $this->banner_image ? asset('images/' . $this->banner_image) : null,
            'thumbnail_image' => $this->thumbnail_image ? asset('images/' . $this->thumbnail_image) : null,
            'article_image' => $this->article_image ? asset('images/' . $this->article_image) : null,
            'paragraph_one' => $this->paragraph_one,
            'paragraph_two' => $this->paragraph_two,
            'paragraph_three' => $this->paragraph_three,
            'type' => $this->type,
            'type_text' => $this->getTypeText(),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'human_readable_date' => $this->created_at->diffForHumans(),
        ];
    }

    /**
     * Get type text based on type value
     */
    private function getTypeText()
    {
        switch ($this->type) {
            case 1:
                return 'Featured';
            case 2:
                return 'Special';
            default:
                return 'Recent';
        }
    }
}
