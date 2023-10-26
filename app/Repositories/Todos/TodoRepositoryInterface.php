<?php

namespace App\Repositories\Todos;

use Illuminate\Support\Collection as Collection;

/**
 * Todoリポジトリクラスのインターフェース
 */
interface TodoRepositoryInterface {

    /**
     * Todoを一つ登録します
     *
     * @param  array $params
     * @return int
     */
    public function insert(array $params): int;

    /**
     * Todoを一つ取得します
     *
     * @param  int $id
     * @return Collection
     */
    public function fetch_todo(int $id): Collection;
}
