<?php

namespace App\Repositories\Todos;

use App\Models\Todo;
use Illuminate\Support\Collection as Collection;

/**
 * Todoリポジトリクラスのインターフェース
 */
interface TodoRepositoryInterface {

    /**
     * Todoを一つ登録します
     *
     * @param  array $params
     * @return Todo
     */
    public function insert(array $params): Todo;

    /**
     * Todoを一つ取得します
     *
     * @param  int $id
     * @return Collection
     */
    public function fetchTodo(int $id): Collection;
}
