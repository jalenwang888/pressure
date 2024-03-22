<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTest;
use Illuminate\Http\Request;

class AbController extends Controller
{
    //

    public function register(Request $request){
        for ($i = 0; $i < 1; $i++) {
            $data = [
                'name' => 'User '.rand_str().' '. $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'),
                'servers' => config('app.SERVER_NAME'),
            ];

            try {
                $user = UserTest::create($data);
                // 判断是否创建成功
                if ($user) {
                    // 获取用户注册信息的 ID
                    $data = [
                        'user_id' => $user->id,
                        'name' => $user->name,
                    ];
                    // 返回用户注册信息的 ID
                    return response()->json(['code' => 0, 'msg' => '', 'data' => $data]);
                } else {
                    // 如果创建失败，抛出异常
                    return response()->json(['code' => 1, 'msg' => 'Failed to create user'], 419);
                }
            } catch (\Exception $e) {
                // 捕获异常，并输出错误信息
                $errorMessage = $e->getMessage(); // 获取异常消息
                $errorCode = $e->getCode(); // 获取异常代码

                // 获取 MySQL 的错误信息
                $sqlErrorMessage = \DB::getPdo()->errorInfo()[2];

                $errors = [
                    'errorMessage' => $errorMessage,
                    'errorCode' =>  $errorCode,
                    'sqlErrorMessage' => $sqlErrorMessage,
                ];
                // 输出错误信息
                return response()->json(['code' => 1, 'msg' => $errors], 419);
            }

        }
    }
}
