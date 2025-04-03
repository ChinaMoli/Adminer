<h1 align="center">Adminer</h1>

## 部署
### 1、下载代码
🇨🇳 国内服务器请执行
```shell
git clone https://gitee.com/ChinaMoli/Adminer.git --depth=1 .
```
🌎 国外服务器请执行
```shell
git clone https://github.com/ChinaMoli/Adminer.git --depth=1 .
```

### 2、配置 Nginx
```nginx
server
{
    // ....
    # 将运行目录指向 public
    root pwd/public;
    // ...
}
```

### 3、重命名入口文件
> [!CAUTION]
> 为了数据库安全，此步骤不能被跳过，否则将无法访问。

打开 `public` 目录，重命名 `index.php` 文件（建议使用 [1Password](https://1password.com/zh-cn/password-generator) 生成的随机密码作为文件名）。

打开浏览器输入 `http://` + `网站域名或 IP:端口` + `/` + `新的文件名` 即可访问。
> 链接示例：`https://127.0.0.1:8080/ucUPKUH05fFdZPb7dgas.php`

## 更新
```shell
git pull
```

## 特别鸣谢
- [Adminer](https://github.com/vrana/adminer/) - Adminer is a full-featured database management tool written in PHP.
- [readable-dates](https://gist.github.com/scr4bble/9ee4a9f1405ffc1465f59e03768e2768) - Replaces UNIX timestamps with human-readable dates in your local format.

## License
MIT License
