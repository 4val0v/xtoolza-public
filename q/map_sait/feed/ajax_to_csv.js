$(document).ready(function() {
    var csv = '',
        temp_array = [];

    // бежим по всем строчкам в таблице начиная с третьей
    $("#show_context > tbody > tr:gt(1)").each(function(i,e){

        // внутри каждой строчки находим все ячейки и бежим по ним
        $(e).find("td").each(function(x,element){

            // добавляем содержимое кадой ячейки во временный массив
            temp_array.push($(element).text());
        });

        // преобразуем временный массив в стринг с разделительной запятой и в конце добавляем перенос строки и возврат каретки
        csv += temp_array.join(";") + '\r\n';
        // console.log(csv); //debug
        // стираем все из временного массива
        temp_array.length = 0;
        temp_array = [];
    });

    // посылаем на сервер полученный CSV стринг
    $.ajax({
        type: 'POST',
        url: '/feed/ajaxresult.php',
        data: {param : csv},
        success: function(result) {
            // делаем что нибудь с полученными с сервера данными, а ничего и не надо делать)
        }
    });
});
