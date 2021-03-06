@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
       <!-- Main content -->
        <section class="content">
        {{Form::open([
            'route' => ['devicetypes.update', $devicetype->id],
            'method' => 'put'
        ])}}
            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Редатировать вид прибора</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название прибора</label>
                            <input type="text" class="form-control" autofocus id="exampleInputEmail1" placeholder="" value="{{$devicetype->name}}" name="name">
                        </div>
                        <div class="form-group">
                            <label>Тип прибора</label>
                            {{Form::select('type_id',
                            $types,
                            $devicetype->type->id,
                            ['class' => 'form-control select2', 'style' => 'width: 100%;'])}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Межповерочный интервал</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$devicetype->interval_of_muster}}" name="interval_of_muster">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Нижний предел измерения</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$devicetype->min_limit}}" name="min_limit">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Верхний предел измерения</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$devicetype->max_limit}}" name="max_limit">
                        </div>
                        <div class="form-group">
                            <label>Единица измерения</label>
                            {{Form::select('unit_id',
                            $units,
                            $devicetype->getUnitId(),
                            ['class' => 'form-control select2',
                            'style' => 'width: 100%;',
                            'placeholder' => 'Выберите единицу измерения'])}}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Сохранить</button>
                    <a href="{{route('devicetypes.index')}}" class="btn btn-default">Назад</a>
                </div>
                <!-- /.box-footer-->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection