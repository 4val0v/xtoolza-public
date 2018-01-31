var links = $('.btn-warning')
,   output = $('.output')
,   curLink;

links.each(function(i,el){
    curLink = $(el);
    output.append(
        '<ul><li>Индекс ссылки: <b>' + i + '</b></li>' +
        '<li>Атрибут href: <b>' + curLink.attr('href')  + '</b></li>' +
        '<li>Текст ссылки: <b>' + curLink.text()  + '</b></li></ul>'
    );
});