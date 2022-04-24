<?php
namespace App\Services\Home;

use App\Models\Users;

class UserService
{
    private $users;

    public function __construct(Users $users)
    {
        $this->users = $users;
    }

    /**
     * userInfo Description：
     * 获取用户信息
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 11:26:15
     *
     * @param $id
     *
     * @return mixed
     */
    public function getUserInfo($id)
    {
        return $this->users->find($id);
    }

    /**
     * updateUserInfo Description：
     * 修改用户信息
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 11:32:21
     *
     * @param $id
     * @param $vip_end_time
     *
     * @return mixed
     */
    public function updateUserInfo($id, $vip_end_time)
    {
        return $this->users->where('id', $id)->update(['vip_end_time' => $vip_end_time]);
    }

    /**
     * createUser Description：
     * 添加用户信息
     *
     * @author Jiahui Wang wangjiahui@ultrapower.com.cn 2022-04-24 11:32:14
     *
     * @param $data
     *
     * @return mixed
     */
    public function createUser($data)
    {
        return $this->users->create($data);
    }
}
