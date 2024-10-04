<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

/**
 * apiの書き方サンプルコントローラー
 *
 * laravelの便利な機能を使わず、バリデーション→変数加工→DB操作→結果加工→json返却 の一連の流れをコントローラーに記載
 * = ファットコントローラーでシンプルな書き方
 * （DB操作はコメントアウトでメモしただけ）
 */
class SampleController
{
    /**
     * GETの例
     */
    public function index(Request $request)
    {
        try {
            // フロントから来たクエリパラメータをバリデーションルールに通す
            // バリデーションに失敗すると以降の処理を通らず、ValidationExceptionの例外を投げる
            $validatedInput = $request->validate([
                // numのクエリパラメータを数値で必須にしている
                'num' => ['integer', 'required'],
            ]);

            // 通ったクエリパラメータを取得して加工なり
            $num = $validatedInput['num'];

            // (ここでDB操作などバックエンドに関する処理を入れる)
            // たとえばDBのidとしてSELECTにかけるなど

            // フロントに返したい結果を配列で用意する
            $result = [
                'status'    => 200,
                'message'   => "you send {$num}",
                'detail'    => 'sucess.',
            ];

        // 失敗を捕捉する
        // バリデーションエラーの場合、こちらの配列を返す
        } catch (ValidationException $e) {
            $result = [
                'status'  => 400,
                'message' => 'client error!',
                'detail'  => $e->getMessage(),
            ];

        // その他のエラーの場合、こちらの配列を返す
        } catch (Exception $e) {
            $result = [
                'status'  => 500,
                'message' => 'server error!',
                'detail'  => $e->getMessage(),
            ];
        }
        // フロントで扱えるようにjsonに変換して出力する
        return response()->json($result);
    }

    /**
     * POSTの例
     * GETとほぼ一緒、バリデーションの対象のパラメータだけ変えた
     */
    public function create(Request $request)
    {
        try {
            // フロントから来たリクエストパラメータをバリデーションルールに通す
            // バリデーションに失敗すると以降の処理を通らず、ValidationExceptionの例外を投げる
            // GETでもPOSTでも値の取得、バリデートの方法は一緒
            $validatedInput = $request->validate([
                // titleのリクエストパラメータをstring(文字列)で必須、にしている
                'title'         => ['string', 'required', 'min:10'],
                'description'   => ['string', 'required'],
            ]);

            $title = $validatedInput['title'];
            $description = $validatedInput['description'];

            // (ここでDB操作などバックエンドに関する処理を入れる)
            // たとえばDBの対象のテーブルに対して、insertするなど

            $message = "'title: {$title}, description: {$description}' created!";

            // フロントに返したい結果を配列で用意する
            $result = [
                'status'    => 200,
                'message'   => $message,
                'detail'    => 'sucess.',
            ];

        // 失敗を捕捉する
        // バリデーションエラーの場合、こちらの配列を返す
        } catch (ValidationException $e) {
            $result = [
                'status'  => 400,
                'message' => 'client error!',
                'detail'  => $e->getMessage(),
            ];
        // その他のエラーの場合、こちらの配列を返す
        } catch (Exception $e) {
            $result = [
                'status'  => 500,
                'message' => 'server error!',
                'detail'  => $e->getMessage(),
            ];
        }
        // フロントで扱えるようにjsonに変換して出力する
        return response()->json($result);
    }

}
