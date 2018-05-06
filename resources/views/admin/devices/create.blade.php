@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => 'devices.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить новый прибор</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Название объекта</label>
                            {{Form::select('consumer_id',
                            $consumers,
                            null,
                            ['class' => 'form-control select2', 'style' => 'width: 100%;'])}}
                        </div>
                        <div class="form-group">
                            <label>Тип(марка) прибора</label>
                            {{Form::select('devicetype_id',
                            $devicetypes,
                            null,
                            ['class' => 'form-control select2', 'style' => 'width: 100%;'])}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заводской номер</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('number')}}" name="number">
                        </div>
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата последней поверки:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{old('last_date')}}" name="last_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Примечание</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('note')}}" name="note">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Добавить</button>
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