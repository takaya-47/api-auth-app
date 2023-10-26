<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\InputData\Todos\StoreTodoInputData;
use App\InputData\Todos\ShowTodoInputData;
use App\Services\Todos\TodoServiceInterface;

class TodoController extends Controller
{

    // NOTE: PHP8以降はプロパティの宣言とコンストラクタの宣言を同時に行える。
    public function __construct(private TodoServiceInterface $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Todo登録
     *
     * @param StoreTodoRequest $request
     */
    public function store(StoreTodoRequest $request)
    {
        // 基本バリデーション通過済みのリクエストデータを取得
        $validated_request = $request->safe()->only(['title', 'content']);

        // InputDataに詰める
        $store_todo_input_data = new StoreTodoInputData($validated_request['title'], $validated_request['content']);

        // Serviceクラスに処理（追加バリデーション含む）を委譲しつつ、戻り値のOutputDataを受け取る。
        $store_todo_output_data = $this->service->store_todos($store_todo_input_data);
        // OutputDataを配列に変換
        $response_data = json_decode(json_encode($store_todo_output_data), true);

        // レスポンス返却
        return response()->json($response_data);
    }

    /**
     * Todo詳細
     *
     * @param int $id
     */
    public function show(int $id)
    {
        $show_todo_input_data = new ShowTodoInputData($id);

        $show_todo_output_data = $this->service->show_todo($show_todo_input_data);
        $response_data = json_decode(json_encode($show_todo_output_data), true);
        return response()->json($response_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        // apiでは不要になるかも（編集のページに相当）
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        //
    }
}
