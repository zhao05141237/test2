<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/6/14
 * Time: 15:55
 */
namespace Fanli\Robot\Observer;

use Hanson\Vbot\Support\File;
use Hanson\Vbot\Support\Mail;

class Observer
{
    public static function setQrCodeObserver($qrCodeUrl)
    {
        vbot('console')->log('二维码链接：'.$qrCodeUrl, '返利网');
        // 获取生成的二维码，发送给用户
        Mail::send($qrCodeUrl);
        File::eventLog2File('qrcode');
    }

    public static function setLoginSuccessObserver()
    {
        // 记录登录成功的时间
        File::eventLog2File('login');
        vbot('console')->log('登录成功', '返利网');
    }

    public static function setReLoginSuccessObserver()
    {
        // 记录免扫码登录成功的时间
        File::eventLog2File('relogin');
        vbot('console')->log('免扫码登录成功', '返利网');
    }

    public static function setExitObserver()
    {
        vbot('console')->log('退出程序', '返利网');
    }

    public static function setFetchContactObserver(array $contacts)
    {
        vbot('console')->log('获取好友成功', '返利网');
        $user_path = vbot()->config->get('user_path');
        File::saveTo($user_path.'/group.json', $contacts['groups']);
    }

    public static function setBeforeMessageObserver()
    {
        vbot('console')->log('准备接收消息', '返利网');
    }

    public static function setNeedActivateObserver()
    {
        vbot('console')->log('准备挂了，但应该能抢救一会', '返利网');
    }
}