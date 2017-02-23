<?php

namespace Guo\Wechat\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template_data extends Model
{
    use SoftDeletes;

    protected  $table="template_data";
}
