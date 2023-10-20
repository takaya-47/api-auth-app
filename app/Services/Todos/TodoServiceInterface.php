<?php

namespace App\Services\Todos;

use App\InputData\Todos\StoreTodoInputData;
use App\OutputData\Todos\StoreTodoOutputData;

/**
 * Todoサービスクラスのインターフェース
 */
interface TodoServiceInterface
{
    /**
     * TODOを登録します
     *
     * @param  StoreTodoInputData $input_data
     * @return StoreTodoOutputData
     */
    public function store_todos(StoreTodoInputData $input_data): StoreTodoOutputData;
}
