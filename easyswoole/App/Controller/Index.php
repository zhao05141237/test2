<?php
/**
 * Created by PhpStorm.
 * User: YF
 * Date: 2017/2/8
 * Time: 11:51
 */

namespace App\Controller;


use App\Model\EmailQueue;
use App\Model\TaskEmailBean;
use App\Task;
use App\Utility\SysConst;
use Core\AbstractInterface\AbstractController;
use Core\Component\Barrier;
use Core\Component\Logger;
use Core\Component\ShareMemory;
use Core\Http\Message\Status;
use Core\Swoole\AsyncTaskManager;
use Core\Swoole\Server;
use Core\UrlParser;
use Core\Component\Di;
use App\Model\TaskBean;
use App\Model\Queue;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Index extends AbstractController
{
    function index()
    {
        // TODO: Implement index() method.
        $this->response()->withHeader("Content-type","text/html;charset=utf-8");
        $this->response()->write('
    <style type="text/css">
       *{ padding: 0; margin: 0; }
       div{ padding: 4px 48px;}
       body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px}
       h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; }
       p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}
    </style>
    <div style="padding: 24px 48px;">
        <h1>:)</h1><p>欢迎使用<b> easySwoole</b></p> 
        <span style="font-size:25px">从未如此之快 - 专为API而生的常驻内存型框架</span>
       <br/>
       <span style="font-size:20px">[ 欢迎前往 <a href="https://github.com/kiss291323003/easyswoole/" target="easySwoole">GitHub</a> 为 easySwoole 赏一个Star ]</span>
   </div>
 ');/*  url:domain/index.html  domain/   domain  */
    }

    function onRequest($actionName)
    {
        // TODO: Implement onRequest() method.
    }

    function actionNotFound($actionName = null, $arguments = null)
    {
        // TODO: Implement actionNotFount() method.
        $this->response()->withStatus(Status::CODE_NOT_FOUND);
        $this->response()->write(file_get_contents(ROOT."/App/Static/404.html"));
    }

    function afterAction()
    {
        // TODO: Implement afterResponse() method.
    }
    function test(){
       $this->response()->write("this is test");
    }

    function test2(){
        $this->response()->write("this is test2");
    }
    function test3(){
        $this->response()->write("this is test2");
    }

    function testdb(){
        $db = Di::getInstance()->get('MYSQL');
        $content = $db->get('tb_convert_img_file'); //contains an Array of all users
        $this->response()->writeJson(200,$content,'success');
    }

    function testemail(){
//        $email = Di::getInstance()->get('EMAIL');
//        var_dump($email);
//        $email->sendMail(array('qi.zhao@fanli.com'),'abc','cdee');

        $mail = new PHPMailer(true);
        try{
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
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
            $mail->addAddress('qi.zhao@fanli.com', 'qi.zhao');     // Add a recipient
//            $mail->addAddress('rui.yao@fanli.com');               // Name is optional
//            $mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('rui.yao@fanli.com');
//            $mail->addBCC('bcc@example.com');

            //Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Here is the subject';
            $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

    }


    function addTask(){
        $url = $this->request()->getRequestParam("url");
        if(empty($url)){
            $url = 'http://wiki.swoole.com/';
        }
        $bean = new TaskBean();
        $bean->setUrl($url);
        //做异步投递
        AsyncTaskManager::getInstance()->add(function ()use($bean){
            Queue::set($bean);
        });
        $this->response()->writeJson(200,null,"任务投递成功");
    }


    function status(){
        $num = ShareMemory::getInstance()->get(SysConst::TASK_RUNNING_NUM);
        $this->response()->writeJson(200,array(
            "taskRuningNum"=>$num
        ));
    }

    function addEmail(){
        $title = $this->request()->getRequestParam("title");
        $content = $this->request()->getRequestParam("content");

        if(empty($title)){
            $title = "this is test";
        }

        if(empty($content)){
            $content = "this is test";
        }

        $bean = new TaskEmailBean();
        $bean->setTitle($title);
        $bean->setContent($content);
        $bean->setToAddress('qi.zhao@fanli.com');
//        $bean->setCcAddress('rui.yao@fanli.com');

        AsyncTaskManager::getInstance()->add(function ()use ($bean){
           EmailQueue::set($bean);
        });
    }

    function shutdown(){
        Server::getInstance()->getServer()->shutdown();
    }
    function router(){
        $this->response()->write("your router not end");
    }

}