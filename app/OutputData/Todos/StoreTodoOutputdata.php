<?php

namespace App\OutputData\Todos;

use JsonSerializable;

/**
 * サービスクラスの出力データを格納するDSとしてのクラス
 */
class StoreTodoOutputData implements JsonSerializable
{
    private int $id;
    private string $title;
    private string $content;

    public function __construct(int $id, string $title, string $content)
    {
        $this->id = $id;
        $this->title = $title;
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
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content
        ];
    }

    // /**
    //  * idを返却します
    //  *
    //  * @return int
    //  */
    // public function get_id(): int
    // {
    //     return $this->id;
    // }

    // /**
    //  * titleを返却します
    //  *
    //  * @return string
    //  */
    // public function get_title(): string
    // {
    //     return $this->title;
    // }

    // /**
    //  * contentを返却します
    //  *
    //  * @return string
    //  */
    // public function get_content(): string
    // {
    //     return $this->content;
    // }
}
