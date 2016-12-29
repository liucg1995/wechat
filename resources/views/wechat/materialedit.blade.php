@extends(config("wxconfig.extends"))

@section('content')
    <section class="content-header">
        <div class="box box-default">
            <form action="/wechat/materialupdate" method="post">
                {{ csrf_field() }}
                <div class="box-header with-border">
                    <h3 class="box-title">摘要内容</h3>
                </div>
                <div class="box-body">
                    <input type="hidden" name="id" value="{{$material['id']}}">
                    <input id="time" type="hidden" name="time" placeholder="请输入时间" value="{{$material['created']}}" required><br>
                    <label for="content">摘要</label><textarea  id="content" class="form-control" rows="3" name="content" placeholder="请输入内容" >{{$material['content']}}</textarea>
                </div>
                <div class="box-footer">
                    <input type="submit" class="btn btn-primary pull-right" value="提交">
                </div>
            </form>
        </div>
    </section>
@endsection

