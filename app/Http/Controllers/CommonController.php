<?php

/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 16-10-21
 * Time: 10:51
 */
namespace Guo\Wechat\Http\Controllers;
use Illuminate\Routing\Controller;

/**
 * Class AdminController    程序后台基础控制器
 * @package App\Http\Controllers\Admin
 */
class CommonController extends Controller
{
    public  function __construct()
    {
        $this->middleware('auth');
    }
}