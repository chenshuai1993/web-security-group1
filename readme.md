## 小组成员

### 何忠利： 用户表 和 关注表
### 王仁杰： 用户列表 接口  
### 张伟：   关注    接口
### 王孟艳： 登录注册 实现 登录接口 注册接口


### xss 攻击: 集体



## demo步骤

1: 先建表

2: 在写注册 登录 接口

3: 关注接口 用户列表

4: 在写xss




### 思路

#### 用户登录
     设置用户id放入 cookie
     格式: cookie['userid'] = 'xxx';
    
    
用户关注
    好友列表: 
      方法名字    getFriends($userid); 
      参数：      用户id
      返回格式:  [
                 status:  true or false
                 message: xxxxx
                 data:[
                     //数据
                 ]
             ]


用户点到关注好友的空间

用户留言

