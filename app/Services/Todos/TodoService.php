<?php

namespace App\Services\Todos;

use Illuminate\Support\Facades\DB;
use App\InputData\Todos\StoreTodoInputData;
use App\OutputData\Todos\StoreTodoOutputData;


/**
 * Todoを取り扱うサービスクラス
 */
class TodoService implements TodoServiceInterface
{

    /**
     * TODOを登録します
     *
     * @param  StoreTodoInputData $input_data
     * @return StoreTodoOutputData
     */
    public function store_todos(StoreTodoInputData $input_data): StoreTodoOutputData
    {
        $title = $input_data->get_title();
        $content = $input_data->get_content();
        $inserted_id = DB::transaction(function () use ($title, $content): int {
            return DB::table('todos')->insertGetId([
                'title'   => $title,
                'content' => $content
            ]);
        });

        return new StoreTodoOutputData($inserted_id, $title, $content);
    }
}
