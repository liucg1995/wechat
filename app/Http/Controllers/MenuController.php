<?php
/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 16-10-28
 * Time: 16:00
 */

namespace Guo\Wechat\Http\Controllers;


use App\Http\Controllers\Admin\AdminController;
use EasyWeChat\Core\Exception;
use Illuminate\Http\Request;

use EasyWeChat\Foundation\Application;


class MenuController extends AdminController
{
    public $app = null;

    public function __construct()
    {
        $this->app = app("wechat");
    }

    /**
     * 显示菜单
     */
    public function index()
    {
        $options = config("app.options");
        $app = new Application($options);
        $menus = $app->menu;
        try {
            $res = $menus->all();
            new  Exception($res);
            $menudata = json_encode($res->menu);
        } catch (Exception $e) {
            $menudata = ' ';
        }
//        $buttons = [
//            [
//                "type" => "view",
//                "name" => "财经日历",
//                "url" => "http://staging.jinrong.tonglingdi.cn/index"
//            ]
//        ];
//        $menus->add($buttons);
        return view("wechat.menu.index", ['menu' => $menudata]);
    }

    /**
     *
     */
    public function setMenu(Request $request)
    {
        $menuData = $request->button;
        $options = config("app.options");
        $app = new Application($options);
        $menu = $app->menu;
        try {
            $res = $menu->add($menuData['button']);
            new  Exception($res);
            return array(
                "errcode" => '0',
                "errmsg" => "ok",
            );
        } catch (Exception $e) {
            return array(
                "errcode" => $e->getCode(),
                "errmsg" => $e->getMessage(),
            );
        }
    }
}