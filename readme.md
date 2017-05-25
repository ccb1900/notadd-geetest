# GeeTest for Notadd
> 本扩展只集成了极验验证最新的3.0的sdk。因官方sdk问题，因此可能不兼容旧版本，如果需要请联系我。
### 描述

极验验证notadd扩展包

### 说明

<p>
后台的全局插件有相关的表单，配置极验验证的appid和appkey，同时可以管理扩展的开启与关闭。
</p>

### 路由

| 路由                  | 用途             | 状态   |
| ------------------- | -------------- | ---- |
| api/geetest/get     | 获取appid和appkey | 开发完成 |
| api/geetest/set     | 设置appid和appkey | 开发完成 |
| api/geetest/servlet | 处理极验验证参数       | 开发中  |

### 安装
```
cd notadd/extensions
mkdir waterloocode
git clone https://github.com/bluegeek/notadd-geetest.git
cd waterloocode/notadd-geetest
composer install --no-dev
```
### 注意事项
- 安装方式请以官方发布的extension安装方式为准


### 参考

- notadd论坛 https://bbs.notadd.com/
- notadd文档 https://docs.notadd.com
- 极验验证php服务端文档 http://docs.geetest.com/install/server/php/