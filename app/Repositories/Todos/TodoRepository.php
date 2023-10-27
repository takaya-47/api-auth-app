<?php

namespace App\Repositories\Todos;

use App\Models\Todo;
use App\Repositories\Todos\TodoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection as Collection;

class TodoRepository implements TodoRepositoryInterface
{

    private string $table_name = 'todos';

    /**
     * @inheritdoc
     */
    public function insert(array $params): Todo
    {
        $todo = Todo::create([
            'title'   => $params['title'],
            'content' => $params['content']
        ]);
        return $todo;
    }

    /**
     * Todoを一つ取得します
     *
     * @param  int $id
     * @return Collection
     */
    public function fetchTodo(int $id): Collection
    {
        $todo = DB::table($this->table_name)
            ->select()
            ->where('id', '=', $id)
            ->get();

        return $todo;
    }
}
