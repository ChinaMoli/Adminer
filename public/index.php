<?php

if (basename(__FILE__) === 'index.php') {
    die(<<<'HTML'
    <h1 style="color:red">为了数据的安全，请将 index.php 文件重命名后再访问。</h1>
    <a href="https://1password.com/zh-cn/password-generator" target="_blank" rel="noopener noreferrer">随机字符串生成器</a>
    HTML);
}

include __DIR__ . '/../entrance.php';
