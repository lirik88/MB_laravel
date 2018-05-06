@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список видов приборов</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                        <a href="{{route('devicetypes.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Название</th>
                            <th>Тип</th>
                            <th>Межповерочный интервал</th>
                            <th>Диапазон измерения</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($devicetypes as $devicetype)
                        <tr>
                            <td>{{$devicetype->id}}</td>
                            <td>{{$devicetype->name}}</td>
                            <td>{{$devicetype->getTypeName()}}</td>
                            <td>{{$devicetype->interval_of_muster}}</td>
                            <td>{{$devicetype->min_limit.'...'
                            .$devicetype->max_limit}} {!! $devicetype->supInt($devicetype->getUnitName())!!}</td>
                            <td><a href="{{route('devicetypes.edit', $devicetype->id)}}" class="fa fa-pencil"></a>
                                {!! Form::open(['route' => ['devicetypes.destroy', $devicetype->id], 'method'=>'delete']) !!}
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