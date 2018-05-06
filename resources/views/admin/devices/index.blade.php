@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список приборов</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('devices.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название объекта</th>
                            <th>Тип(марка) прибора</th>
                            <th>Заводской номер</th>
                            <th>Дата следующей поверки</th>
                            <th>Примечание</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($devices as $device)
                        <tr>
                            <td>{{$device->id}}</td>
                            <td>{{$device->consumer->name.' ('
                                .$device->consumer->object_name.')'}}</td>
                            <td>{{$device->devicetype->name}}</td>
                            <td>{{$device->number}}</td>
                            <td class="{{$device->getCssAlerts($device->next_date)}}">{{$device->getFormatDate($device->next_date)}}</td>
                            <td>{{$device->note}}</td>
                            <td><a href="{{route('devices.edit', $device->id)}}" class="fa fa-pencil"></a>
                                {!! Form::open(['route' => ['devices.destroy', $device->id], 'method'=>'delete']) !!}
                                <button onclick="return confirm('Удалить?')" type="submit" class="delete">
                                    <i class="fa fa-remove"></i>
                                </button>
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection