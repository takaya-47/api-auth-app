<?php

namespace App\Repositories\Todos;

use App\Repositories\Todos\TodoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection as Collection;

class TodoRepository implements TodoRepositoryInterface
{

    private string $table_name = 'todos';

    /**
     * Todoを一つ登録します
     *
     * @param  array $params
     * @return int
     */
    public function insert(array $params): int
    {
        return DB::table($this->table_name)->insertGetId($params);
    }

    /**
     * Todoを一つ取得します
     *
     * @param  int $id
     * @return Collection
     */
    public function fetch_todo(int $id): Collection
    {
        $todo = DB::table($this->table_name)
            ->select()
            ->where('id', '=', $id)
            ->get();

            // なんとか配列で返したい
        return $todo;
    }
}
