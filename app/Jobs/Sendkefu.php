<?php

namespace Guo\Wechat\Jobs;

use Guo\Wechat\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use EasyWeChat\Core\Exception;


class Sendkefu extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $staff;
    private $message;
    private $openid;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($staff,$message,$openid)
    {
        $this->staff = $staff;
        $this->message = $message;
        $this->openid = $openid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $this->staff->message($this->message)->to($this->openid)->send();
        } catch (Exception $e) {
//                return redirect($request['url'])->with('mgssages', array(0 => '提交失败'));
        }
    }
}
