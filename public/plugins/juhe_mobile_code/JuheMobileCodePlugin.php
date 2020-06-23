<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace plugins\juhe_mobile_code;//Demo插件英文名，改成你的插件英文就行了
use cmf\lib\Plugin;

/**
 * JuheMobileCodePlugin
 */
class JuheMobileCodePlugin extends Plugin
{

    public $info = [
        'name'        => 'JuheMobileCode',
        'title'       => '聚合手机验证码',
        'description' => '聚合手机验证码插件',
        'status'      => 1,
        'author'      => 'Kinlink',
        'version'     => '1.0'
    ];

    public $has_admin = 0;//插件是否有后台管理界面

    public function install() //安装方法必须实现
    {
        return true;//安装成功返回true，失败false
    }

    public function uninstall() //卸载方法必须实现
    {
        return true;//卸载成功返回true，失败false
    }

    //实现的send_mobile_verification_code钩子方法
    public function sendMobileVerificationCode($param)
    {
        $mobile        = $param['mobile'];//手机号
        $code          = $param['code'];//验证码
        $config        = $this->getConfig();
        $expire_minute = intval($config['expire_minute']);
        $expire_minute = empty($expire_minute) ? 30 : $expire_minute;
        $expire_time   = time() + $expire_minute * 60;
        $result        = false;

//        $result = [
//            'error'     => 1,
//            'message' => '服务商返回结果错误'
//        ];

        $result = [
            'error'     => 0,
            'message' => '您的验证码是'.$code
        ];
        return $result;
    }

}