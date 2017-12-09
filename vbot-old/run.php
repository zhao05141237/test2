# run.php
<?php
require_once __DIR__.'/vendor/autoload.php';

$path = __DIR__.'/tmp/';
$options = [
   'path'     => $path,
   
   /*
    * 下载配置项
    */
   'download' => [
       'image'         => true,
       'voice'         => true,
       'video'         => true,
       'emoticon'      => true,
       'file'          => true,
       'emoticon_path' => $path.'emoticons', // 表情库路径（PS：表情库为过滤后不重复的表情文件夹）
   ],
   /*
    * 输出配置项
    */
   'console' => [
       'output'  => true, // 是否输出
       'message' => true, // 是否输出接收消息 （若上面为 false 此处无效）
   ],
   /*
    * 日志配置项
    */
   'log'      => [
       'level'         => 'debug',
       'permission'    => 0777,
       'system'        => $path.'log', // 系统报错日志
       'message'       => $path.'log', // 消息日志
   ],
   /*
    * 缓存配置项
    */
   'cache' => [
       'default' => 'redis', // 缓存设置 （支持 redis 或 file）
       'stores'  => [
           'file' => [
               'driver' => 'file',
               'path'   => $path.'cache',
           ],
           'redis' => [
               'driver'     => 'redis',
               'connection' => 'default',
           ],
       ],
   ],

   'database' => [
        'redis' => [
            'client'  => 'predis',
            'default' => [
                'host'     => '127.0.0.1',
                'password' => null,
                'port'     => 6379,
                'database' => 13,
            ],
        ],
    ],
    
   /*
    * 拓展配置
    * ==============================
    * 如果加载拓展则必须加载此配置项
    */
   'extension' => [
       // 管理员配置（必选），优先加载 remark_name
       'admin' => [
           'remark'   => '',
           'nickname' => '',
       ],
   ],

    /**
     * 不处理自己发的消息
     */
    'self_off' => false,
];
$vbot = new Hanson\Vbot\Foundation\Vbot($options);
//var_dump(class_exists(Fanli\Robot\Handlers\MessageHandler::messageHandler(function (){})));exit;
//$vbot->messageHandler->setHandler(function ($message) {
//    Hanson\Vbot\Message\Text::send($message['from']['UserName'], 'Hi, I\'m Vbot!');
//});
$vbot->messageHandler->setHandler([Fanli\Robot\Handlers\MessageHandler::class, 'messageHandler']);

$vbot->server->serve();