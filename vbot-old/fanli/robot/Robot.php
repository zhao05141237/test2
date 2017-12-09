<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/6/14
 * Time: 14:16
 */
namespace Fanli\Robot;

use Hanson\Vbot\Exceptions\ConfigErrorException;
use Hanson\Vbot\Foundation\Vbot;
use Fanli\Robot\Observer\Observer;
use Fanli\Robot\Handlers\MessageHandler;
use Hanson\Vbot\Support\File;

class Robot
{
    private $config;

    public function __construct($session = null)
    {
        $this->config = require_once(__DIR__ . '/../../config/vbot.config.php');

        if($session){
            $this->config['session'] = $session;
        }
    }

    public function run()
    {
        $bot = new Vbot($this->config);

        // get gaea config
//        $gaea = json_decode($bot->http->json($bot->config->get('gaea.url')), true);
//        if(empty($gaea['data'])){
//            $bot->console->log('gaea配置异常，请检查配置');
//            throw new ConfigErrorException('gaea配置异常，请检查配置');
//        }
//        // 保存gaea信息到配置
//        $bot->config->set('gaea.rule', $gaea['data']);

        $bot->messageHandler->setHandler([MessageHandler::class, 'messageHandler']);

//        $bot->observer->setQrCodeObserver([Observer::class, 'setQrCodeObserver']);
//
//        $bot->observer->setLoginSuccessObserver([Observer::class, 'setLoginSuccessObserver']);
//
//        $bot->observer->setReLoginSuccessObserver([Observer::class, 'setReLoginSuccessObserver']);
//
//        $bot->observer->setExitObserver([Observer::class, 'setExitObserver']);
//
//        $bot->observer->setFetchContactObserver([Observer::class, 'setFetchContactObserver']);
//
//        $bot->observer->setBeforeMessageObserver([Observer::class, 'setBeforeMessageObserver']);
//
//        $bot->observer->setNeedActivateObserver([Observer::class, 'setNeedActivateObserver']);
//
//        // 记录最后一次启动时间
//        File::eventLog2File('startup');
        $bot->server->serve();

    }
}
