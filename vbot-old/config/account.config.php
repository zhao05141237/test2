<?php
/**
 * Created by PhpStorm.
 * User: yunzhou.cao
 * Date: 2017/7/31
 * Time: 14:36
 */

/**
 * 邮箱账号和微信账号的对应关系
 * 一对多
 */
return array(
    'account_mappings' => array(
        // 接警邮件地址
        'wenxue.zhang@fanli.com' => [
            // 微信id
            '2838575010',
        ],
    ),
    /**
     * 微信账号信息
     */
    'wx_account' => [
        '2838575010' => [
            'nick_name' => '文雪的小毛驴'
        ],
    ],
);