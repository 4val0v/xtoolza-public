var links = $('.btn-warning')
,   output = $('.output')
,   curLink;

links.each(function(i,el){
    curLink = $(el);
    output.append(
        '<ul><li>������ ������: <b>' + i + '</b></li>' +
        '<li>������� href: <b>' + curLink.attr('href')  + '</b></li>' +
        '<li>����� ������: <b>' + curLink.text()  + '</b></li></ul>'
    );
});