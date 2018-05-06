@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                {!! Form::open(['route' => 'stamps.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить новый акт пломбировки</h3>
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
                        <!-- Date -->
                        <div class="form-group">
                            <label>Дата составления акта:</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{old('act_date')}}" name="act_date">
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
                            @for($i = 1; $i <= 7; $i++)
                            <tr>
                                <td>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('place_$i')}}" name="place_{{$i}}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('number_$i')}}" name="number_{{$i}}">
                                </td>
                            </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-success pull-right">Добавить</button>
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