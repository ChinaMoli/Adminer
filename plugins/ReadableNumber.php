<?php

use Adminer\Plugin;

/**
 * 将 UNIX 时间戳、IPv4Int 等数字转换为人类可读的格式
 */
class ReadableNumber extends Plugin
{
    public function head()
    {
        echo $this->getStyle(), PHP_EOL, $this->getScript();
    }

    private function getStyle(): string
    {
        return <<<HTML
        <style>
            .plugin-readable-number {
                color: #007F00;
                -webkit-user-select: all !important;
                -moz-user-select: all !important;
                user-select: all !important;
            }
        </style>
        HTML;;
    }

    private function getScript(): string
    {
        return script_src_with_version('./assets/js/readable-number.min.js');
    }
}
