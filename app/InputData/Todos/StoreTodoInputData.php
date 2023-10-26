<?php

namespace App\InputData\Todos;

/**
 * Todo登録において入力データを格納するクラス
 */
class StoreTodoInputData
{
    private string $title;
    private string $content;

    public function __construct(string $title, string $content)
    {
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * titleを返却します
     *
     * @return string
     */
    public function get_title(): string
    {
        return $this->title;
    }

    /**
     * contentを返却します
     *
     * @return string
     */
    public function get_content(): string
    {
        return $this->content;
    }
}
