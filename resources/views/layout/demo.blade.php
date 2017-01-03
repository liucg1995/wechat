@extends("layouts.app")
@section('content')
    <link rel="stylesheet" href="{{url("/bower_components/AdminLTE/plugins/iCheck/all.css")}}">

    <section class="content-header">
        <h1>
            用户管理
            <small>User tables</small>
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="box">
                    <div class="box-header with-border box-danger">
                        <h3 class="box-title">细节问题请访问:https://almsaeedstudio.com/themes/AdminLTE/index2.html</h3>
                    </div>
                    <div class="box-body ">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label>Date masks:</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="glyphicon glyphicon-th"></i>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'"
                                           data-mask="">
                                </div>
                                <!-- /.input group -->
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Minimal</label>
                                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        tabindex="-1" aria-hidden="true">
                                    <option selected="selected">Alabama</option>
                                    <option>Alaska</option>
                                    <option>California</option>
                                    <option>Delaware</option>
                                    <option>Tennessee</option>
                                    <option>Texas</option>
                                    <option>Washington</option>
                                </select>
                            </div>
                            {{--<div class="form-group col-sm-4">--}}
                                {{--<label>Date masks:</label>--}}

                                {{--<div class="form-group">--}}
                                    {{--<label class="">--}}
                                        {{--<div class="iradio_flat-green checked" aria-checked="true" aria-disabled="false" style="position: relative;"><input type="radio" name="r3" class="flat-red" checked="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>--}}
                                    {{--</label>--}}
                                    {{--<label class="">--}}
                                        {{--<div class="iradio_flat-green" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="radio" name="r3" class="flat-red" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>--}}
                                    {{--</label>--}}
                                    {{--<label>--}}
                                        {{--<div class="iradio_flat-green disabled" aria-checked="false" aria-disabled="true" style="position: relative;"><input type="radio" name="r3" class="flat-red" disabled="" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>--}}
                                        {{--Flat green skin radio--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                                {{--<!-- /.input group -->--}}
                            {{--</div>--}}
                            <div class="form-group col-sm-2">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-block btn-primary">Primary</button>

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                Rendering engine
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Browser
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Platform(s)
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">Engine
                                                version
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                CSS grade
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>

                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Gecko</td>
                                            <td>Firefox 1.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.7</td>
                                            <td>A</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 57 entries
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous disabled" id="example2_previous">
                                                <a
                                                        href="#" aria-controls="example2" data-dt-idx="0"
                                                        tabindex="0">《</a>
                                            </li>
                                            <li class="paginate_button active">
                                                <a href="#" aria-controls="example2"
                                                   data-dt-idx="1" tabindex="0">1</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2"
                                                   data-dt-idx="2" tabindex="0">2</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2"
                                                   data-dt-idx="3" tabindex="0">3</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2"
                                                   data-dt-idx="4" tabindex="0">4</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2"
                                                   data-dt-idx="5" tabindex="0">5</a>
                                            </li>
                                            <li class="paginate_button ">
                                                <a href="#" aria-controls="example2"
                                                   data-dt-idx="6" tabindex="0">6</a>
                                            </li>
                                            <li class="paginate_button next" id="example2_next">
                                                <a href="#"
                                                   aria-controls="example2"
                                                   data-dt-idx="7"
                                                   tabindex="0">》</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <section class="content">
            <div class="row">
                <div class="col-md-6">

                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Input masks</h3>
                        </div>
                        <div class="box-body">
                            <!-- Date dd/mm/yyyy -->
                            <div class="form-group">
                                <label>Date masks:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'"
                                           data-mask="">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- phone mask -->
                            <div class="form-group">
                                <label>US phone mask:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control"
                                           data-inputmask="&quot;mask&quot;: &quot;(999) 999-9999&quot;" data-mask="">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- phone mask -->
                            <div class="form-group">
                                <label>Intl US phone mask:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control"
                                           data-inputmask="'mask': ['999-999-9999 [x99999]', '+099 99 99 9999[9]-9999']"
                                           data-mask="">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->

                            <!-- IP mask -->
                            <div class="form-group">
                                <label>IP mask:</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-laptop"></i>
                                    </div>
                                    <input type="text" class="form-control" data-inputmask="'alias': 'ip'" data-mask="">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <div class="form-group">
                                <div class="input-group">
                                    <button type="button" class="btn btn-block btn-success btn-flat col-sm-2">Success</button>
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- /.box -->

                </div>
                <!-- /.col (left) -->
            </div>
            <!-- /.row -->
            <style>
                .pagination {
                    float: right;
                }
            </style>
        </section>
        {{--<script src="{{url("/bower_components/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>--}}
        {{--<script src="{{url("/bower_components/AdminLTE/plugins/iCheck/icheck.js")}}"></script>--}}
@endsection
