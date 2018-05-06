@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
            {!! Form::open(['route' => 'consumers.store']) !!}
                <div class="box-header with-border">
                    <h3 class="box-title">Добавить новое предприятие</h3>
                    @include('admin.errors')
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" autofocus class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('name')}}" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название объекта</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('object_name')}}" name="object_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Адрес объекта</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('object_address')}}" name="object_address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Должность представителя потребителя</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('member_position')}}" name="member_position">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Должность представителя потребителя (...в присутствии)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('member_position_p')}}" name="member_position_p">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Фамилия И.О. представителя потребителя</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('member_name')}}" name="member_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Фамилия И.О. представителя потребителя (...в присутствии)</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('member_name_p')}}" name="member_name_p">
                        </div>
                        <div class="form-group">
                            <label>Вид договорных отношений</label>
                            {{Form::select('contract_id',
                            $contracts,
                            null,
                            ['class' => 'form-control select2',
                             'style' => 'width: 100%;'])}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Номер Договора</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{old('contract_number')}}" name="contract_number">
                        </div>
                        <div class="form-group">
                            <label>Дата Договора</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="datepicker" value="{{old('contract_date')}}" name="contract_date">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Заключение к акту проверки</label>
                            <textarea id="exampleInputEmail1" cols="30" rows="10" class="form-control" name="conclusion">{{old('conclusion')}}</textarea>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="box-footer">
                        <button class="btn btn-success pull-right">Добавить</button>
                        <a href="{{route('consumers.index')}}" class="btn btn-default">Назад</a>
                    </div>
                </div>
                <!-- /.box-footer-->
            {!! Form::close() !!}
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection