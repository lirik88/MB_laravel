@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список актов пломбировки</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('stamps.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название объекта</th>
                            <th>Дата составления акта</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($stamps as $stamp)
                            <tr>
                                <td>{{$stamp->id}}</td>
                                <td>{{$stamp->consumer->name.' ('
                                .$stamp->consumer->object_name.')'}}</td>
                                <td>{{$stamp->getFormatDate($stamp->act_date)}}</td>
                                <td><a href="{{route('stamps.edit', $stamp->id)}}" class="fa fa-pencil"></a>
                                    {!! Form::open(['route' => ['stamps.destroy', $stamp->id], 'method'=>'delete']) !!}
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