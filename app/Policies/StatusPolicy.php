<?php

namespace App\Policies;

//引入用户模型和微博模型，并添加 destroy 方法定义微博删除动作相关的授权。
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use App\Models\Status;

class StatusPolicy
{
    use HandlesAuthorization;

    public function destroy(User $user, Status $status)
    {
        return $user->id === $status->user_id;
    }
}