<?php

namespace App\Services\Todos;

use App\InputData\Todos\ShowTodoInputData;
use Illuminate\Support\Facades\DB;
use App\InputData\Todos\StoreTodoInputData;
use App\OutputData\Todos\ShowTodoOutputData;
use App\OutputData\Todos\StoreTodoOutputData;
use App\Repositories\Todos\TodoRepositoryInterface;

/**
 * Todoを取り扱うサービスクラス
 */
class TodoService implements TodoServiceInterface
{

    public function __construct(private TodoRepositoryInterface $repository)
    {
    }

    /**
     * Todoを登録します
     *
     * @param  StoreTodoInputData $input_data
     * @return StoreTodoOutputData
     */
    public function store_todos(StoreTodoInputData $input_data): StoreTodoOutputData
    {
        $title = $input_data->get_title();
        $content = $input_data->get_content();

        $inserted_id = DB::transaction(function () use ($title, $content): int {
            return $this->repository->insert(['title' => $title, 'content' => $content]);
        });

        return new StoreTodoOutputData($inserted_id, $title, $content);
    }

    /**
     * Todoの詳細を取得します
     *
     * @param  ShowTodoInputData $input_data
     * @return ShowTodoOutputData
     */
    public function show_todo(ShowTodoInputData $input_data): ShowTodoOutputData
    {
        $id = $input_data->get_id();
        $todo = $this->repository->fetch_todo($id);

        // Collectionクラスで返却されたのを
        return new ShowTodoOutputData($todo->all());
    }
}
