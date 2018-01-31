$(document).ready(function()
{
$("#areatw").keyup(function()
{
var box=$(this).val();
var main = box.length *100;
var value= (main / 100);
var count= 100 - box.length;

if(box.length <= 100)
{
$('#count').html(count);
$('#bar').animate(
{
"width": value+'%',
}, 1);
}
else if(box.length > 70 && box.length <= 100)
{
$('#count').html(count);
$('#bar_new').animate(
{
"width": value+'%',
}, 1);
}
else
{
alert(' Введено более 100 символов ');
}
return false;
});

});