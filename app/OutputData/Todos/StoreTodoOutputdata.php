<?php

namespace App\OutputData\Todos;

use JsonSerializable;

/**
 * Todo登録において出力データを格納するクラス
 */
class StoreTodoOutputData implements JsonSerializable
{
    private int $id;
    private string $title;
    private string $content;

    public function __construct(int $id, string $title, string $content)
    {
        $this->id      = $id;
        $this->title   = $title;
        $this->content = $content;
    }


    /**
     * JSONシリアル化時に含めるデータを指定します
     *
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'id'      => $this->id,
            'title'   => $this->title,
            'content' => $this->content
        ];
    }
}
