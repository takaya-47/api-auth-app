<?php

namespace App\Services\Todos;

use App\InputData\Todos\ShowTodoInputData;
use Illuminate\Support\Facades\DB;
use App\InputData\Todos\StoreTodoInputData;
use App\OutputData\Todos\ShowTodoOutputData;
use App\OutputData\Todos\StoreTodoOutputData;
use App\Repositories\Todos\TodoRepositoryInterface;
use App\Models\Todo;

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
    public function storeTodos(StoreTodoInputData $input_data): StoreTodoOutputData
    {
        $title = $input_data->getTitle();
        $content = $input_data->getContent();

        $todo = DB::transaction(function () use ($title, $content): Todo {
            return $this->repository->insert(['title' => $title, 'content' => $content]);
        });

        return new StoreTodoOutputData($todo);
    }

    /**
     * Todoの詳細を取得します
     *
     * @param  ShowTodoInputData $input_data
     * @return ShowTodoOutputData
     */
    public function showTodo(ShowTodoInputData $input_data): ShowTodoOutputData
    {
        $id = $input_data->geId();
        $todo = $this->repository->fetchTodo($id);

        return new ShowTodoOutputData($todo->all());
    }
}
