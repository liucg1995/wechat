<?php

namespace Guo\Wechat\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function test()
    {
       echo config("config.extends");
    }
    public function delfile(Request $request)
    {
        $dir = dirname(storage_path()) .'/'. $request->dir;
        @unlink($dir);

    }

    public function dirlist(Request $request)
    {
        $dir = dirname(storage_path()). '/'.$request->dir;
        $dirArray[] = NULL;
        if (false != ($handle = opendir($dir))) {
            $i = 0;
            while (false !== ($file = readdir($handle))) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".." && !strpos($file, ".")) {
                    $dirArray[$i] = $file;
                    $i++;
                }
            }
            //关闭句柄
            closedir($handle);
        }
        return $dirArray;
    }

//获取文件列表
    function filelist(Request $request)
    {
//        dd($request->dir);
        $dir = dirname(storage_path()) .'/'. $request->dir;
        $fileArray[] = NULL;
        if (false != ($handle = opendir($dir))) {
            $i = 0;
            while (false !== ($file = readdir($handle))) {
                //去掉"“.”、“..”以及带“.xxx”后缀的文件
                if ($file != "." && $file != ".." && strpos($file, ".")) {
                    $fileArray[$i] = $file;
                    if ($i == 100) {
                        break;
                    }
                    $i++;
                }
            }
            //关闭句柄
            closedir($handle);
        }
        return $fileArray;
    }

    public function getcontent(Request $request)
    {
        echo "<pre>";
        echo $dir = dirname(storage_path()).'/'.$request->dir;
        echo file_get_contents($dir);
    }
    public function getlog()
    {
        echo "<pre>";
        echo $dir = dirname(storage_path()).'/storage/logs/laravel.log';
        echo file_get_contents($dir);
    }
}
