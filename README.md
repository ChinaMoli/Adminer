<h1 align="center">Adminer</h1>

## 部署
### 1、下载代码
```shell
git clone git@github.com:ChinaMoli/Adminer.git . && ln entrance.php "./public/adminer-$(uuidgen | cut -c1-8).php"
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

### 3、访问 Adminer
打开 `public` 目录找到以 `adminer-` 开头的文件并复制文件名。

打开浏览器输入 `http://` + `网站域名或 IP` + `/` + `复制的文件名` 即可访问。
> 链接示例：`https://127.0.0.1/adminer-9218ce96.php`


## License
MIT License
