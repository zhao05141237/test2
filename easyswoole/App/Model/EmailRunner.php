<?php
/**
 * Created by PhpStorm.
 * User: qi.zhao
 * Date: 2017/11/7
 * Time: 18:24
 */

namespace App\Model;

use App\Utility\SysConst;
use Core\AbstractInterface\AbstractAsyncTask;
use Core\Component\Logger;
use Core\Component\ShareMemory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class EmailRunner extends AbstractAsyncTask
{
    function handler(\swoole_server $server, $taskId, $fromId)
    {
        // TODO: Implement handler() method.
        //记录处于运行状态的task数量
        $share = ShareMemory::getInstance();
        $share->startTransaction();
        $share->set(SysConst::TASK_RUNNING_NUM,$share->get(SysConst::TASK_RUNNING_NUM)+1);
        $share->commit();
        //while其实为危险操作，while会剥夺进程控制权
        while (true){
            $task = EmailQueue::pop();
//            $task = Queue::pop();
            if($task instanceof TaskEmailBean){
                $title = $task->getTitle();
                $content = $task->getContent();
                $toAddress = $task->getToAddress();
                $ccAddress = $task->getCcAddress();

                if(!empty($title) && !empty($content) && !empty($toAddress)){
                    $mail = new PHPMailer(true);
                    try{
                        //Server settings
                        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
                        $mail->isSMTP();                                      // Set mailer to use SMTP
                        $mail->Host = '192.168.100.150';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = false;                               // Enable SMTP authentication
                        $mail->Username = 'fanlierp';                 // SMTP username
                        $mail->Password = 'fanlierp@123';                           // SMTP password
                        $mail->SMTPSecure = false;                            // Enable TLS encryption, `ssl` also accepted
                        $mail->CharSet = 'utf-8';

                        $mail->Port = 25;                                    // TCP port to connect to

                        //Recipients
                        $mail->setFrom('dev_research@fanli.com', '技术研究');
                        if(!is_array($toAddress)){
                            $mail->addAddress($toAddress,'');
                        }else{
                            foreach ($toAddress as $key => $val){
                                $mail->addAddress($val,'');
                            }
                        }

                        if(!empty($ccAddress)){
                            if(!is_array($ccAddress)){
                                $mail->addCC($ccAddress,'');
                            }else{
                                foreach ($ccAddress as $key => $val){
                                    $mail->addCC($val,'');
                                }
                            }
                        }

                        //Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = $title;
                        $mail->Body    = $content;
                        $mail->send();

                        $toAddressStr = is_array($toAddress) ? implode(",",$toAddress) : $toAddress;
                        $ccAddressStr = is_array($ccAddress) ? implode(",",$ccAddress) : $ccAddress;
                        Logger::getInstance()->log("finish send email: toaddress is ".$toAddressStr." ccaddress is " . $ccAddress ." title is ".$title." content is ".$content);
                    } catch (Exception $e) {
                        Logger::getInstance()->log("Message could not be sent. Mailer Error: ".$mail->ErrorInfo);
                    }
                }else{
                    echo empty($title) ? 'title is null' : ''.empty($content) ? 'content is null' : '' .empty($toAddress) ? 'toaddress is null' : '';
                    Logger::getInstance()->log(empty($title) ? 'title is null' : ''.empty($content) ? 'content is null' : '' .empty($toAddress) ? 'toaddress is null' : '');
                }
            }else{
                break;
            }
        }
//        Logger::getInstance()->console("async task exit");
        $share->startTransaction();
        $share->set(SysConst::TASK_RUNNING_NUM,$share->get(SysConst::TASK_RUNNING_NUM)-1);
        $share->commit();
    }

    function finishCallBack(\swoole_server $server, $task_id, $resultData)
    {
        // TODO: Implement finishCallBack() method.
    }

}