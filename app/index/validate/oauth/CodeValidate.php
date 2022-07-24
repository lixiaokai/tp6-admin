<?php
declare(strict_types=1);

namespace app\index\validate\oauth;

use app\common\validate\BaseValidate;

/**
 * 临时凭据 code - 验证器类.
 */
class CodeValidate extends BaseValidate
{
    public function rules(): array
    {
        return [
            'code' => ['require', 'alphaNum'],
        ];
    }

    public function fields(): array
    {
        return [
            'code' => '临时凭据 code',
        ];
    }
}
