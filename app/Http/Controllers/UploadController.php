<?php

namespace Guo\Wechat\Http\Controllers;

use Illuminate\Http\Request;
////use WechatToken;
use EasyWeChat\Foundation\Application;
use Redirect, Input, Response;
class UploadController extends  CommonController
{
    /**
     * @param Request $request
     * @return array
     * ajax 上传图片
     */

    public function imgUpload(Request $request)
    {
        $file = $request->file('file');
        $id = $request->id;
        $allowed_extensions = ["png", "jpg", "gif"];
        if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
            return ['error' => 'You may only upload png, jpg or gif.'];
        }

        $destinationPath = config("wxconfig.upload");
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($destinationPath, $fileName);
        $app =    $this->wechat();
        $temporary = $app->material_temporary;
        $result = $temporary->uploadImage($destinationPath.'/'.$fileName);
        $array = json_decode($result,true);
        $media_id = $array['media_id'];
        return Response::json(
            [
                'success' => true,
                'pic' => asset($destinationPath.$fileName),
                'id' => $id,
                'media_id' => $media_id
            ]
        );
    }
}