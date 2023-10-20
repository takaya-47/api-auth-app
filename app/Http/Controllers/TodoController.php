<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\InputData\Todos\StoreTodoInputData;
use App\Services\Todos\TodoService;
use App\Services\Todos\TodoServiceInterface;

class TodoController extends Controller
{

    protected TodoServiceInterface $service;

    public function __construct()
    {
        $this->service = new TodoService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // apiでは不要になるかも（新規登録のページに相当）
    }

    /**
     * Store a newly created resource in storage.
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
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
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
