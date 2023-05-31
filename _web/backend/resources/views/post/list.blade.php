@extends('layouts.base')

@section('title', '投稿一覧')

@section('main')

<div>

    <h1>投稿一覧</h1>

    <hr>

    <form action="/posts" method="get">
        <select name="sort" id="">
            <option value="">ID順</option>
            <option value="category">カテゴリーID順</option>
            <option value="user">ユーザーID順</option>
            <option value="last_create">作成順</option>
        </select>
        <input type="submit" value="並び替え">
    </form>

    <hr>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ユーザーID</th>
                <th>カテゴリーID</th>
                <th>タイトル</th>
                <th>本文</th>
                <th>作成日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $item)
            <tr>
                <th>{{ $item->id }}</th>
                <th>{{ $item->user_id }}</th>
                <th>{{ $item->category_id }}</th>
                <th>{{ $item->title }}</th>
                <th>{{ $item->content }}</th>
                <th>{{ $item->created_at }}</th>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection