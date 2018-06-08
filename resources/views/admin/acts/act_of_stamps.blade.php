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
            width: 100%;
        }
        table, th, td {
            border: 1px solid black;
            text-align: left;
            padding: 0px 5px;
            white-space: nowrap;
            font-size: 20px;
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
            font-size: 20px;
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
        <h3>установки пломб на УУГ</h3>
        <br>
        <p style="text-align: right">от {{$stamps->getFormatDate($stamps->act_date)}}</p>
        <br>
        <p>Мы нижеподписавшиеся: представитель филиала АО "Мособлгаз" "Ступиномежрайгаз" инженер КИП и А {{$consumer->user->name}} и представитель владельца узла учета газа {{$consumer->member_position." ".$consumer->member_name." ".$consumer->name}}, составили настоящий акт о том, что произведена установка пломб на объекте:</p>
        <br>
        <p><b>{{$consumer->name." ".$consumer->object_name}}</b> {{$consumer->object_address}}</p>
        <br>
        <table>
            <thead>
            <tr>
                <th>№ п/п</th>
                <th>Место установки пломбы</th>
                <th>Номер установленной пломбы</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{$stamps->place_1}}</td>
                    <td>{{$stamps->number_1}}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>{{$stamps->place_2}}</td>
                    <td>{{$stamps->number_2}}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>{{$stamps->place_3}}</td>
                    <td>{{$stamps->number_3}}</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>{{$stamps->place_4}}</td>
                    <td>{{$stamps->number_4}}</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>{{$stamps->place_5}}</td>
                    <td>{{$stamps->number_5}}</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>{{$stamps->place_6}}</td>
                    <td>{{$stamps->number_6}}</td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>{{$stamps->place_7}}</td>
                    <td>{{$stamps->number_7}}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <p>Согласно {{$nameOfContract}} Транспортировки газа при самовольном снятии пломб, установленных филиалом АО "Мособлгаз" "Ступиномежрайгаз", объем газа будет пределяться по проектной мощности неопломбированного газоиспользующего оборудования исходя из его 24-часовой работы в сутки - с 1-го числа отчетного месяца до момента обнаружения их снятия и установки новых пломб.</p>
        <br>
        <p>Представитель ГРО &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;________________&emsp;&emsp;&emsp; {{$consumer->user->name}}</p>
        <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;(подпись)</p>
        <p>Представитель владельца</p>
        <p>УУГ (потребителя) &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;________________&emsp;&emsp;&emsp; {{$consumer->member_name}}</p>
        <p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;(подпись)</p>
    </section>
</div>
</body>
</html>