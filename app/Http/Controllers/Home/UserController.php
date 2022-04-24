<?php

namespace App\Http\Controllers\Home;

use App\Services\Home\LineService;
use App\Services\Home\UserService;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * getUserInfo Description：
     * 获取用户信息
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 11:45:54
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserInfo()
    {
        $id = request()->input('id');
        if (!$id) {
            return lreturn_json([], '参数错误', 1501);
        }

        $user = $this->userService->getUserInfo($id);
        if (!$user) {
            return lreturn_json([], '用户不存在', 1502);
        }

        return lreturn_json($user);
    }

    /**
     * openOrRenewalVip Description：
     * 会员开通或续费
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 14:51:44
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function openOrRenewalVip()
    {
        $id = request()->input('id');
        if (!$id) {
            return lreturn_json([], '参数错误', 1501);
        }

        $user = $this->userService->getUserInfo($id);
        if (!$user) {
            return lreturn_json([], '用户不存在', 1502);
        }

        $user->vip_end_time = request()->input('vip_end_time');
        $user->save();

        return lreturn_json($user);
    }

    /**
     * createUser Description：
     * 创建用户
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 14:56:17
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser()
    {
        $ip = request()->input('ip');
        if (!$ip) {
            return lreturn_json([], '参数错误，ip必填', 1501);
        }

        $device_language = request()->input('device_language');
        if (!$device_language) {
            return lreturn_json([], '参数错误，device_language必填', 1501);
        }

        $area = request()->input('area');
        if (!$area) {
            return lreturn_json([], '参数错误，area必填', 1501);
        }

        $create_data = [
            'ip' => $ip,
            'device_language' => $device_language,
            'area' => $area,
        ];

        $user = $this->userService->createUser($create_data);
        return lreturn_json($user);
    }
}
