<?php

use function Adminer\script_src;

class ReadableNumber
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
        return script_src('./assets/js/readable-number.min.js?v=25032001');
    }
}
