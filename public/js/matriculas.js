function addMatricula(data){
    var new_item = $('<div>');
    var table = $('<table>').addClass('table', 'the-table').css('margin-bottom', 0);
    $('<colgroup>').append($('col')).appendTo(table);
    $('<tr>').
        append($('<td>').text(data.camara).css('width','150px')).
        append($('<td>').text(data.lugar).css('width','250px')).
        append($('<td>').text(data.matricula).css('width','90px')).
        append($('<td>').text(data.propietario).css('width','250px')).appendTo(table);
    table.appendTo(new_item)
    new_item.hide().addClass('flash').prependTo('#records').slideDown('slow');

    var $articleCount = $('#records').children().length;
    while ($articleCount > 8) {
        $('#records').children().last().remove();
        $articleCount = $('#records').children().length;
    }
}
