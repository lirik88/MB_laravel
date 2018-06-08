@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список предприятий</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('consumers.create')}}"
                           class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название предприятия</th>
                            <th>Название объекта</th>
                            <th>Акты</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($consumers as $consumer)
                            <tr>
                                <td>{{$consumer->id}}</td>
                                <td>{{$consumer->name}}</td>
                                <td>{{$consumer->object_name}}</td>
                                <td>
                                    <a href="{{route('acts.act_of_control', $consumer->id)}}"
                                       class="glyphicon glyphicon-ok"
                                       title="Акт проверки" target="_blank"></a>
                                    <a href="{{route('acts.act_of_stamps', $consumer->id)}}"
                                       class="glyphicon glyphicon-lock"
                                       title="Акт установки пломб" target="_blank"></a>
                                    <a href="{{route('acts.act_of_program', $consumer->id)}}"
                                       class="glyphicon glyphicon-object-align-bottom"
                                       title="Акт программирования корректора" target="_blank"></a>
                                </td>
                                <td>
                                    <a href="{{route('consumers.edit',
                                     $consumer->id)}}" class="fa fa-pencil"></a>
                                    {!! Form::open(['route' => ['consumers.destroy',
                                     $consumer->id], 'method'=>'delete']) !!}
                                    <button onclick="return confirm('Удалить?')"
                                            type="submit" class="delete">
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