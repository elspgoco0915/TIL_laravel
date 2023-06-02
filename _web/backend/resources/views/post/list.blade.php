@extends('layouts.base')

@section('title', '投稿一覧')

@section('main')

<div>

    <h1 class="text-3xl font-bold">投稿一覧</h1>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <h2 class="text-bold text-2xl">並び替え機能</h2>

    <form action="/posts" method="get" class="w-full">
        <div class="flex">
            <div class="relative">
                <select name="sort" class="block appearance-none w-full border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
                    {{-- 初期状態はID順 --}}
                    <option value="">
                        ID順
                    </option>
                    {{--　選択した場合 --}}
                    @foreach($orderOptions as $option)
                    <option value="{{ $option->value }}"
                            @if($selectedSort === $option->value) selected @endif>
                        {{ $option->label() }}
                    </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
            <input type="submit" value="並び替え" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        </div>
    </form>

    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

    <table class="m-2 w-10/12 table-auto border-collapse border border-slate-400">
        <thead>
            <tr class="bg-gray-200">
                <th class="w-1/12 border border-slate-300">ID</th>
                <th class="w-1/12 border border-slate-300">ユーザーID</th>
                <th class="w-1/12 border border-slate-300">カテゴリーID</th>
                <th class="w-3/12 border border-slate-300">タイトル</th>
                <th class="w-4/12 border border-slate-300">本文</th>
                <th class="w-2/12 border border-slate-300">作成日時</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list as $item)
            <tr>
                <th class="border border-slate-300">{{ $item->id }}</th>
                <th class="border border-slate-300">{{ $item->user_id }}</th>
                <th class="border border-slate-300">{{ $item->category_id }}</th>
                <th class="border border-slate-300">{{ $item->title }}</th>
                <th class="border border-slate-300">{{ $item->content }}</th>
                <th class="border border-slate-300">{{ $item->created_at }}</th>
            </tr>
            @endforeach
        </tbody>

    </table>

</div>


@endsection
