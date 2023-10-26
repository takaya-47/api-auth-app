<?php

namespace App\InputData\Todos;

/**
 * Todo詳細において入力データを格納するDSとしてのクラス
 */
class ShowTodoInputData
{
    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * idを返却します
     *
     * @return int
     */
    public function get_id(): int
    {
        return $this->id;
    }
}
