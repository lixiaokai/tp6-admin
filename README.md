
## 项目介绍

基于 ThinkPHP 6.0 的通用管理后台

### 1. 自动多应用部署模式

例如：admin 应用 ( 后台应用 )
> http://localhost:8000/index.php/admin/index/index
>
> 应用名：`admin` 控制器：`index` 方法名：`index`

例如：index 应用 ( 前台应用 )
> http://localhost:8000/index.php/index/index/index
> 
> 应用名：`index` 控制器：`index` 方法名：`index`


## 环境要求

- PHP 8.0+ ( 兼容 PHP 8.1 )


## 安装依赖

```
composer install
```


## 更新依赖

```
composer update
```


## 目录结构


## 常用命令

### 1. 快速启用项目

在项目根目录执行如下命令，即可启用自带的 http 服务器

```
// 默认端口 8000
php think run

// 指定端口 80
php think run -p 80
```

浏览器访问：
- 默认端口 8080 ：http://localhost:8000
- 指定端口 80 ：http://localhost

### 2. 快速创建应用

```
php think build demo
```

### 3. 快速生成控制器

默认生成资源控制器，注意控制器名称要用大写

```
// 生成一级控制器: app/admin/controller/UserController.php
php think make:controller admin@User

// 生成多级控制器: app/admin/controller/auth/UserController.php
php think make:controller admin@auth/User
```

### 4. 快速生成模型

生成 `admin` 应用的 `Blog` ( 注意首字母大写 ) 模型类库文件
```
php think make:model admin@Blog
```

### 5. 快速生成验证器

生成 `admin` 应用的 `UserValidate` ( 注意首字母大写 ) 验证器类文件
```
php think make:validate admin@UserValidate
```
