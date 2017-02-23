<?php

namespace Guo\Wechat\Jobs;

use Guo\Wechat\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use EasyWeChat\Core\Exception;
use Log;

class SendTemp extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    private $notice;
    private $templateId;
    private $url;
    private $data;
    private $openid;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($notice,$templateId,$url,$data,$openid)
    {
        $this->notice=$notice;
        $this->templateId=$templateId;
        $this->url=$url;
        $this->data=$data;
        $this->openid=$openid;
        //
    }

    /**
     * Execute the job.
     *  $templateId 模板消息ID
     *  $url  链接
     *  $data   模板数据
     * @return void
     */
    public function handle()
    {
        if(env("IS_SEND")){

            //将发送模板消息添加到队列
            try {

                $result = $this->notice->uses($this->templateId)->withUrl($this->url)->andData($this->data)->andReceiver($this->openid)->send();
                Log::info("向".$this->openid ."发送模板消息 地址".$this->url);
                new  Exception($result);
            } catch (Exception $e) {
                echo json_encode(array(
                    "errcode" => $e->getCode(),
                    "errmsg" => $e->getMessage(),
                ));
            }


        }


    }
}
