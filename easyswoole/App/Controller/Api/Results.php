<?php
/**
 * Created by PhpStorm.
 * User: yf
 * Date: 2017/3/15
 * Time: 下午8:21
 */

namespace App\Controller\Api;


use App\Model\EmailQueue;
use App\Model\EmailRunner;
use App\Model\NewideasBean;
use App\Model\SubscribesBean;
use App\Model\TaskEmailBean;
use Core\AbstractInterface\AbstractController;
use Core\Component\Logger;
use Core\Http\Message\Status;
use Core\Component\Di;
use Core\Swoole\AsyncTaskManager;
use Core\Utility\Curl\Request;

class Results extends AbstractController
{

    function index()
    {
        // TODO: Implement index() method.
        $this->response()->write("this is api index");/*  url:domain/api/index.html  domain/api/  */
    }



    function topics()
    {
        $this->response()->withAddedHeader('Access-Control-Allow-Origin','*');
        $db = Di::getInstance()->get('MYSQL');

//        $content = $db->get('tb_research_topic'); //contains an Array of all users

        $page = $this->request()->getRequestParam('page');
        $page = empty($page) || intval($page) <= 0 ? 1 : $page;

        $limit = $this->request()->getRequestParam('limit');
        $limit = empty($limit) || intval($limit) <= 0 ? 20 : $limit;


        $tab = $this->request()->getRequestParam('tab');
        $tab = !empty($tab) ? $tab : 'all';
        //set page limit to 2 results per page. 20 by default
        $db->pageLimit = $limit;
        if($tab != 'all'){
            $db->where("tags like '%$tab%'");
        }
        $db->orderBy("ctime","desc");
        $topics = $db->arraybuilder()->paginate("tb_research_topic", $page);
        $result = array();
        foreach ($topics as $key => $row){
            $result[$key]['title'] = $row['title'];
            $result[$key]['url'] = $row['url'];
            $result[$key]['tags'] = explode(",",$row['tags']);
            $result[$key]['publish'] = $row['ctime'];
        }
        $this->response()->writeJson(200,array('totalPage'=>$db->totalPages,'list'=>$result),'success');
    }


    function subscribe(){
        $this->response()->withAddedHeader('Access-Control-Allow-Origin','*');
        $uid = $this->getUserId();
        if($this->checkUid($uid)){
            $userInfo = $this->getUserInfo($uid);
            if(empty($userInfo['email']) || empty($userInfo['name'])){
                $this->response()->writeJson(500,null,'用户信息不全');
            }else{
                $subscribes = new SubscribesBean();
                $subscribes->setUid($uid);
                $subscribes->setName($userInfo['name']);
                $subscribes->setEmail($userInfo['email']);

                $db = Di::getInstance()->get('MYSQL');
                $updateColumns = Array ("ctime");
                $lastInsertId = "id";
                $db->onDuplicate($updateColumns, $lastInsertId);
                $id = $db->insert("tb_research_subscribe",$subscribes->toArray());
                if($id > 0){
                    $this->response()->writeJson(200,null,'订阅成功');
                }else{
                    $msg = '订阅失败 param is :'.json_encode($subscribes->toArray()). ' error is '.$db->getLastError();
                    $this->log($msg);
                    $this->response()->writeJson(500,null,'订阅失败');
                }
            }
        }else{
            $this->response()->writeJson(500,null,'用户id必传');
        }
    }

    function hassubscribe(){
        $this->response()->withAddedHeader('Access-Control-Allow-Origin','*');
        $uid = $this->getUserId();
        if($this->checkUid($uid)){
            $db = Di::getInstance()->get('MYSQL');
            $db->where("uid = {$uid}");
            $content = $db->get('tb_research_subscribe',1);
            $data = array('flag'=>0);
            if(!empty($content)){
                $data['flag'] = 1;
            }
            $this->response()->writeJson(200,$data,'success');
        }else{
            $this->response()->writeJson(500,null,'用户id必传');
        }
    }


    function suscribes(){
        $db = Di::getInstance()->get('MYSQL');

        $content = $db->get('tb_research_subscribe'); //contains an Array of all users

        $this->response()->writeJson(200,$content,'success');
    }

    function sendemail(){
        $ids = $this->request()->getRequestParam('ids');
        $title = $this->request()->getRequestParam('title');
        $content = $this->request()->getRequestParam('content');
        if(!empty($ids) && !empty($title) && !empty($content)){
            $ids = explode(",",$ids);
            if(!empty($ids)){
                $db = Di::getInstance()->get('MYSQL');
                $db->where("id in (".implode(',',$ids).")");
                $cols = Array ("email");
                $emailist = $db->get('tb_research_subscribe',null,$cols);
                $emarr = array_column($emailist,'email');
                if(empty($emarr)){
                    $this->response()->writeJson(500,null,'邮箱获取失败');
                }else{
                    $bean = new TaskEmailBean();
                    $bean->setTitle($title);
                    $bean->setContent($content);
                    $bean->setToAddress($emarr);
                    AsyncTaskManager::getInstance()->add(function () use ($bean){
                        EmailQueue::set($bean);
                    });
                    $this->response()->writeJson(200,null,'提交成功');
                }
            }else{
                $this->response()->writeJson(500,null,'参数错误');
            }
        }else{
            $this->response()->writeJson(500,null,'参数不全');
        }

    }


    function newidea()
    {
        $this->response()->withAddedHeader('Access-Control-Allow-Origin','*');
        $uid = $this->getUserId();
        if($this->checkUid($uid)){
            $userInfo = $this->getUserInfo($uid);
            $content = $this->request()->getRequestParam('content');
            if(empty($userInfo['name']) || empty($content)){
                $this->response()->writeJson(500,null,'用户信息不全或者内容为空');
            }else{
                $newIdeaBeans = new NewideasBean();
                $newIdeaBeans->setUid($uid);
                $newIdeaBeans->setName($userInfo['name']);
                $newIdeaBeans->setContent($content);
                $db = Di::getInstance()->get('MYSQL');
                $id = $db->insert("tb_research_idea",$newIdeaBeans->toArray());
                if($id > 0){
                    //投递邮件任务
                    $bean = new TaskEmailBean();
                    $bean->setTitle("用户需求提交");
                    $content = $userInfo['name']."({$uid})用户提交了新需求:".$content;
                    $bean->setContent($content);
//                    $bean->setToAddress(array('qi.zhao@fanli.com','rui.yao@fanli.com'));
                    $bean->setToAddress('dev_research@fanli.com');
//        $bean->setCcAddress('rui.yao@fanli.com');
                    AsyncTaskManager::getInstance()->add(function () use ($bean){
                       EmailQueue::set($bean);
                    });
                    $this->response()->writeJson(200,null,'提交成功');
                }else{
                    $msg = '提交失败 param is :'.json_encode($newIdeaBeans->toArray()). ' error is '.$db->getLastError();
                    $this->log($msg);
                    $this->response()->writeJson(500,null,'提交失败');
                }
            }
        }else{
            $this->response()->writeJson(500,null,'用户id必传');
        }
    }


    function afterAction()
    {
        // TODO: Implement afterAction() method.
    }

    function onRequest($actionName)
    {
        // TODO: Implement onRequest() method.
    }

    function actionNotFound($actionName = null, $arguments = null)
    {
        // TODO: Implement actionNotFount() method.
        $this->response()->withStatus(Status::CODE_NOT_FOUND);
    }

    function afterResponse()
    {
        // TODO: Implement afterResponse() method.
    }

    private function getUserInfo($uid){
        $url = "http://erp.office.51fanli.com/Ding/OtherSystemDing/userInfo?uid=".$uid;
        $req = new Request($url);
        $ret = $req->exec()->getBody();
        if(!empty($ret)){
            $userInfo = json_decode($ret,true);
            return $userInfo['data'];
        }else{
            return array();
        }
    }

    private function getUserId(){
        $uid = $this->request()->getRequestParam('uid');
        return $uid;
    }

    private function checkUid($uid){
        if(empty($uid) || intval($uid) <= 0){
            return false;
        }
        return true;
    }

    private function log($message){
        $log = Logger::getInstance('');
        $log->log($message);
        return true;
    }
}