<?php
declare(strict_types=1);

/**
 * 扩展语言包.
 *
 * 说明：<br/>
 * 如果没有生效，请查看 `config/lang.php` 中的 `extend_list` 配置
 *
 * 使用：
 * 1. echo __('messages.not.found');
 * 2. echo __('messages.not.found', ['name' => '某某信息']);
 */

return [
    'messages.not.found' => '{:name} 不存在',
];
