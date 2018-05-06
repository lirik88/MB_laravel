@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route' => ['devices.update', $device->id],
            'method' => 'put'
        ])}}
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редактировать прибор</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название объекта</label>
                            {{Form::select('consumer_id',
                            $consumers,
                            $device->consumer->id,
                            ['class' => 'form-control select2', 'style' => 'width: 100%;'])}}
                        </div>
                        <div class="form-group">
                            <label>Тип(марка) прибора</label>
                            {{Form::select('devicetype_id',
                            $devicetypes,
                            $device->devicetype->id,
                            ['class' => 'form-control select2', 'style' => 'width: 100%;'])}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заводской номер</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$device->number}}" name="number">
                        </div>
                        <div class="form-group">
                            <label>Дата последней поверки:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{$device->getFormatDate($device->last_date)}}" name="last_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Примечание</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$device->note}}" name="note">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Сохранить</button>
                    <a href="{{route('devices.index')}}" class="btn btn-default">Назад</a>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection