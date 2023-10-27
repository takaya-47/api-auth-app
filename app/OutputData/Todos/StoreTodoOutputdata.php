<?php

namespace App\OutputData\Todos;

use App\Models\Todo;

/**
 * Todo登録において出力データを格納するクラス
 */
class StoreTodoOutputData
{
    private Todo $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    /**
     * todoを取得します
     *
     * @return Todo
     */
    public function getTodo(): Todo
    {
        return $this->todo;
    }
}
