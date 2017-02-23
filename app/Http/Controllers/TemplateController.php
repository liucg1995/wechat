<?php

namespace Guo\Wechat\Http\Controllers;


use Guo\Wechat\Model\Template;
use Guo\Wechat\Model\Template_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;


class TemplateController extends CommonController
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function lists()
    {

        $list = Template::orderBy('id', 'desc')->paginate(15);
        return view("wechat::template.list", ['list' => $list]);
    }

    public function add()
    {

        if ($this->request->isMethod("post")) {
            if (!empty($this->request->template_title)) {
                $template_title = $this->request->template_title;

                $count = Template::where(['title' => $template_title])->count();
                if ($count > 0) {
                    return redirect('template/list')
                        ->withErrors(array("标识已经存在"))
                        ->withInput();
                } else {
//                    DB::beginTransaction();
//                    try {
                    $template_id = $this->request->template_id;
                    $t_id = Template::insertGetId(array("title" => $template_title,'template_id'=>$template_id));
                    if (!empty($t_id)) {
                        $key = $this->request->key;
                        $value = $this->request->value;
                        $data = array();
                        foreach ($key as $keys => $val) {
                            $data[] = array("key" => $val, 'value' => $value[$keys],'t_id'=>$t_id);
                        }
                        $status = Template_data::insert($data);
//                        var_dump($status,$t_id);
                        if($status){
                            return redirect('template/list')->with('messages', array("添加成功"));
                        }
                    }
//                        DB::commit();
//                    } catch (\Exception $e) {
//                        return redirect('template/list')
//                            ->withErrors(array("添加异常"))
//                            ->withInput();
//                        //接收异常处理并回滚
//                        DB::rollBack();
//                    }
                }
            }
        } else {
            return view("wechat::template.add");
        }

    }


    public function  update(){
        if ($this->request->isMethod("post")) {
            $template_title = $this->request->template_title;
            $template_id = $this->request->template_id;
            $tid=$this->request->tid;
            $t=$ts=$status=$return="";
            $t_info = Template::where(['id' => $tid])->first();
            if($t_info->title != $template_title || $t_info->template_id != $template_id){
//                Template::where(['id' => $tid])->update(['title'=>$template_title]);
                $t_info->title=$template_title;
                $t_info->template_id=$template_id;
                $t= $t_info->save();
            }

            $key = $this->request->key;
            $value = $this->request->value;
            $td_id = $this->request->td_id;
            $data = array();
            foreach ($key as $keys =>$val){
                if(!empty($td_id[$keys])){
                    $t_data = Template_data::where(['id' => $td_id[$keys]])->first();
                    $t_data->key=$val;
                    $t_data->value=$value[$keys];
                    $ts[]= $t_data->save();
                }else{
                    $data[]=array("key" => $val, 'value' => $value[$keys],'t_id'=>$tid);

                }
            }
            if(!empty($data)){
                $status = Template_data::insert($data);
            }
            ($t==true)?$return[]="主数据修改成功":"主数据修改失败";
            foreach ($ts as $val){
                if($val!=true){
                    $return['fu']="数据修改失败";
                    break;
                }
            }
            !isset($return['fu'])?$return[]="副数据修改成功":"副数据修改失败";
            ($status==true)?$return[]="数据插入成功":"数据插入失败";
            return redirect('template/list')->with('messages', $return);


        }else{
            $tid=$this->request->id;
            $t_info = Template::where(['id' => $tid])->first();
            $t_data= Template_data::where(['t_id' => $tid])->get();
            return view("wechat::template.update",['info'=>$t_info,'data'=>$t_data]);
        }
    }

    public function  sel_data(){
        $tid=$this->request->id;
        $t_data="";
        if(!empty($tid)){
            $t_data['main'] = Template::where(["id"=>$tid])->first();
            $t_data['vice'] = Template_data::where(['t_id' => $tid])->get();
        }
        return $t_data;

    }

    public function  deletes(){
        $tid=$this->request->id;
        $status=Template::where(["id"=>$tid])->delete();
        $return="";
        if(!empty($status)){

           $return[]="主数据删除成功";

            $sta=Template_data::where(['t_id' => $tid])->delete();
            if($sta){
                $return[]="副数据删除成功";
            }else{
                $return[]="副数据删除失败";
            }
            return   redirect('/template/list')->with('messages', $return);
        }else{
            return   redirect('/template/list')->with('messages', array(0 => '删除失败'));
        }

    }

    public function  test(){
        Log::info('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?'.$_SERVER['QUERY_STRING']);
        die;
        if(1){
            return redirect('template/list')->with('messages', array("主数据"));

        }else{
            return redirect('template/list')->with('messages', array("主数据删除失败"));
        }
    }


}
