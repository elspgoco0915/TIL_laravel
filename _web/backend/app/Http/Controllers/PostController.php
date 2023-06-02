<?php

namespace App\Http\Controllers;

use App\Collections\AdminNotificationCollection;
use App\Enums\Order;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * コンストラクタ
     */
    public function __construct(
        public Post $post
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('post.list', [
            // 指定した順番で取得
            'list'         => $this->post->getSortedList($request),
            // 選択項目のenum
            'orderOptions' => Order::cases(),
            // 選択しているソートの入力値
            'selectedSort' => intval($request->input('sort')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
