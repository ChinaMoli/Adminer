<?php

declare(strict_types=1);

use function Adminer\script_src;

if (! function_exists('env')) {
    /**
     * 获取 .env 文件的配置
     */
    function env(string $key, $default = null)
    {
        $path = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';
        if (! file_exists($path)) {
            return $default;
        }
        $value = parse_ini_file($path, true, INI_SCANNER_RAW)[$key] ?? null;
        if (is_null($value)) {
            return $default;
        }
        // 兼容 PHP 7.x
        switch ($value) {
            case 'true':
                return true;
            case 'false':
                return false;
            default:
                return $value;
        };
    }
}

if (! function_exists('script_src_with_version')) {
    /**
     * 返回带有版本号的 script
     */
    function script_src_with_version(string $src): string
    {
        return script_src($src . '?v=' . APP_VERSION);
    }
}
