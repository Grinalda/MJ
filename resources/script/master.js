
function isEmpty(element) {
    if (element.attr('type') === 'password')
        return (element.val().length < 1);
    else
        return (element.val().replace(/\s/g, '') === '' || (element.val() === '0' && element[0]["localName"] === "select") );

}

function validation1(_element) {
    var validation;
    _element.each(function () {
        if (isEmpty($(this)) && !$(this).hasClass("noObrigatory")) {
            $(this).addClass('empty');
            $(this).attr('placeholder','Campo Obrigatório');
            validation = false;
        } else {
            $(this).removeClass('empty');
            validation = true;
        }
    });
    _element.on("keyup ", function () {
        $(this).removeClass('empty');
    });

    return validation;

}

function alterFormateDate(date, delimiter) {
    var newDate = date.split(delimiter);
    newDate = $.makeArray(newDate);
    return newDate[2]+"-"+newDate[1]+"-"+newDate[0];
}

function alterDelimiter(date, delimiter) {
    var newDate = date.split(delimiter);
    newDate = $.makeArray(newDate);
    return newDate[0]+"-"+newDate[1]+"-"+newDate[2];
}

function loadComoBoxIDandValue(element, array, id, value) {
    for (var x=0; x < array.length; x++){
        var lista = array[x];
        element.append('<option value="'+ lista[id] +'">'+lista[value]+'</option>');
    }
}