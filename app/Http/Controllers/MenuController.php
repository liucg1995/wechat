<?php
/**
 * Created by PhpStorm.
 * User: dev001
 * Date: 16-10-28
 * Time: 16:00
 */

namespace Guo\Wechat\Http\Controllers;


use EasyWeChat\Core\Exception;
use Illuminate\Http\Request;
use WechatToken;
use EasyWeChat\Core\AccessToken;
use EasyWeChat\Foundation\Application;


class MenuController extends CommonController
{

    public $wechat = null;

    public function __construct()
    {

        $wechat=  $this->wechat();
        $this->wechat = $wechat;
    }

    /**
     * 显示菜单
     */
    public function index()
    {
        $app = $this->wechat;
        $menus = $app->menu;
        try {
            $res = $menus->all();
            new  Exception($res);
            $menudata = json_encode($res->menu);
        } catch (Exception $e) {
            $menudata = json_encode(array());
        }
        return view("wechat::wechat.menu.index", ['menu' => $menudata]);
    }

    /**
     *
     */
    public function setMenu(Request $request)
    {
        $menuData = $request->button;
        $app = $this->wechat;
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