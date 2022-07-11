<?php
declare (strict_types = 1);

namespace app\common\model;

use think\db\Query;
use think\Model;

/**
 * 模型 - 基类.
 *
 * @method static Query where(mixed $field, mixed $op = null, mixed $condition = null) 查询条件
 */
class BaseModel extends Model
{
    /**
     * 数据转换为驼峰命名.
     *
     * 例如：<br/>
     * $user = User::find(1); <br/>
     * echo $user->createTime;   // 正确 <br/>
     * echo $user->create_time;  // 错误
     *
     * @var bool
     */
    protected $convertNameToCamel = true;
}
