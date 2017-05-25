# GeeTest for Notadd
> 本扩展只集成了最新的3.0的sdk。
### 说明
<p>
后台的全局插件有相关的表单，配置极验验证的appid和appkey，同时可以管理扩展的开启与关闭。
</p>

### 路由
- api/geetest/get
    - 获取appid和appkey
- api/geetest/set
    - 设置appid和appkey

> 以上两个，普通用户用不到

- api/geetest/servlet
    - 开发中

### 安装
```
cd notadd/extensions
mkdir waterloocode
git clone https://github.com/bluegeek/notadd-geetest.git
cd waterloocode/notadd-geetest
composer install --no-dev
```
### 注意事项
- 安装方式以官方发布的extension安装方式为准

