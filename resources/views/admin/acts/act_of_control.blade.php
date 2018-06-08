<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            text-align: center;
            padding: 0px 5px;
        }
        .nowrap {
            white-space: nowrap;
        }
        .left-td {
            text-align: left;
        }
        .head-p {
            font-size: 11.5px;
            font-weight: bold;
        }
        h1, h3 {
            text-align: center;
            margin: 0;
        }
        p {
            font-size: 18px;
            text-align: justify;
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <p class="head-p">
                АО "Мособлгаз" филиал "Ступиномежрайгаз"
                Адрес: г.Ступино, ул.Горького, д.18,
                Тел./факс: 8(496)64-9-03-04(доб.07952)
                E-mail:{{$consumer->user->email}}
            </p>
            <br>
            <h1>АКТ</h1>
            <h3>проверка узла учета газа</h3>
            <h3>от _____________ 201__г.</h3>
            <h3>{{$consumer->name.$consumer->object_name}}</h3>
            <br>
            <p>Расположенного по адресу: {{$consumer->object_address}}</p>
            <p>Представитем филиала АО "Мособлгаз" "Ступиномежрайгаз" инженером КИПиА {{$consumer->user->name_p}} в соответствии с  {{$phrases[0].$consumer->contract_number}} от {{$consumer->getFormatDate($consumer->contract_date)." ".$phrases[1]}} в присутствии представителя предприятия {{$consumer->member_position_p." ".$consumer->member_name_p}} с _____ по _____ проведена проверка узла учета газа.</p>
            <br>
            <table>
                <thead>
                <tr>
                    <th class="nowrap">Состав узла учета</th>
                    <th class="nowrap">Тип и марка прибора</th>
                    <th class="nowrap">Заводской номер</th>
                    <th class="nowrap">Дата следующей поверки</th>
                    <th class="nowrap">Диапазон измерения</th>
                </tr>
                </thead>
                <tbody>
                @foreach($devices as $device)
                    <tr>
                        <td class="left-td nowrap">{{$device->devicetype->type->name}}</td>
                        <td class="nowrap">{{$device->devicetype->name}}</td>
                        <td class="nowrap">{{$device->number}}</td>
                        <td class="nowrap">{{$device->getFormatDate($device->next_date)}}</td>
                        <td class="nowrap">{{$device->devicetype->min_limit.'...'
                                    .$device->devicetype->max_limit}} {!! $device->devicetype->supInt($device->devicetype->getUnitName())!!}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <br>
            <table>
                <thead>
                <tr>
                    <td colspan="3">Показания средств измерения</td>
                    <td colspan="6">Показания корректора (вычислителя)</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style="width: 11.11%">Показания счетчика, м<sup>3</sup></td>
                    <td style="width: 11.11%">Pизб., по манометру на УУГ</td>
                    <td style="width: 11.11%">&#916;P на счетчике</td>
                    <td style="width: 11.11%">Vco, нм<sup>3</sup></td>
                    <td style="width: 11.11%">Vрo, нм<sup>3</sup></td>
                    <td style="width: 11.11%">P</td>
                    <td style="width: 11.11%">T, <sup>o</sup>C</td>
                    <td style="width: 11.11%">Qр, м<sup>3</sup>/ч</td>
                    <td style="width: 11.11%">Qc, нм<sup>3</sup>/ч</td>
                </tr>
                <tr>
                    <td style="height: 20px;"></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
            <p><b>Опломбирование:</b> согласно Акту установки пломб от {{$stamp->getFormatDate($stamp->act_date)}}</p>
            <p>______________________________________________________________________________________________</p>
            <p><b>Соответствие установленного газоиспользующего оборудования:</b> Установленное газоиспользующее оборудование&emsp;&emsp; соответствует указанному в Приложении №{{$phrases[2].' '.$consumer->contract_number}} от {{$consumer->getFormatDate($consumer->contract_date)}}</p>
            <p><b>Проверка герметичности:</b></p>
                        <p>______________________________________________________________________________________________</p>
            <p><b>В ходе проверки:</b>
            </p>
            <p>______________________________________________________________________________________________</p>
            <p>______________________________________________________________________________________________</p>
            <p>______________________________________________________________________________________________</p>
            <p>______________________________________________________________________________________________</p>
            <p>______________________________________________________________________________________________</p>
            <p>______________________________________________________________________________________________</p>
            <p>______________________________________________________________________________________________</p>
            <p><b>Заключение:</b></p>
            <p>{{$consumer->conclusion}}</p>
            <p>______________________________________________________________________________________________</p>
            <p>______________________________________________________________________________________________</p>
            <br>
            <p>Представитель ГРО &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;________________&emsp;&emsp;&emsp; {{$consumer->user->name}}</p>
            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;(подпись)</p>
            <p>Подпись представителя (-ей)</p>
            <p>организации-потребителя &emsp;&emsp;&emsp;________________&emsp;&emsp;&emsp; {{$consumer->member_name}}</p>
            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;(подпись)</p>
            <p>С актом ознакомлен и</p>
            <p>один экземпляр получил &emsp;&emsp;&emsp;&nbsp;&nbsp;________________&emsp;&emsp;&emsp; {{$consumer->member_name}}</p>
            <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;(подпись)</p>
        </section>
    </div>
</body>
</html>