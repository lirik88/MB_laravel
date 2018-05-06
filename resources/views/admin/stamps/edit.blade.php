@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route' => ['stamps.update', $stamp->id],
            'method' => 'put'
        ])}}
        <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактировать акт пломбировки</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название объекта</label>
                            {{Form::select('consumer_id',
                            $consumers,
                            $stamp->consumer->id,
                            ['class' => 'form-control select2', 'style' => 'width: 100%;'])}}
                        </div>
                        <div class="form-group">
                            <label>Дата составления акта:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{$stamp->getFormatDate($stamp->act_date)}}" name="act_date">
                            </div>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Место установки пломб</th>
                                <th>Номер пломбы</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->place_1}}" name="place_1">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->number_1}}" name="number_1">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->place_2}}" name="place_2">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->number_2}}" name="number_2">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->place_3}}" name="place_3">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->number_3}}" name="number_3">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->place_4}}" name="place_4">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->number_4}}" name="number_4">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->place_5}}" name="place_5">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->number_5}}" name="number_5">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->place_6}}" name="place_6">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->number_6}}" name="number_6">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->place_7}}" name="place_7">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$stamp->number_7}}" name="number_7">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Сохранить</button>
                    <a href="{{route('stamps.index')}}" class="btn btn-default">Назад</a>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection