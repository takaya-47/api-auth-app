<?php

namespace App\Services\Todos;

use App\InputData\Todos\StoreTodoInputData;
use App\InputData\Todos\ShowTodoInputData;
use App\OutputData\Todos\StoreTodoOutputData;
use App\OutputData\Todos\ShowTodoOutputData;

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

    /**
     * TODO詳細を取得します
     *
     * @param  ShowTodoInputData $input_data
     * @return ShowTodoOutputData
     */
    public function show_todo(ShowTodoInputData $input_data): ShowTodoOutputData;
}
