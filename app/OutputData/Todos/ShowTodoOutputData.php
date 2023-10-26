<?php

namespace App\OutputData\Todos;

use JsonSerializable;

/**
 * Todo詳細において出力データを格納するクラス
 */
class ShowTodoOutputData implements JsonSerializable
{
    private int $id;
    private string $title;
    private string $content;
    private string $created_at;
    private string $updated_at;

    public function __construct(array $params)
    {
        foreach ($params as $key => $value) {
            // if (property_exists($this, $key)) {
                $this->$key = $value;
            // }
        }
    }


    /**
     * JSONシリアル化時に含めるデータを指定します
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'         => $this->id,
            'title'      => $this->title,
            'content'    => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
