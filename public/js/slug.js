$(document).ready(function () {
    $("#name").keyup(function () {
        var cadena = $(this).val();
        string_to_slug(cadena);
    });
});


function string_to_slug(str) {
    str = str.replace(/^\s+|\s+$/g, '');
    str = str.toLowerCase();

    //quita acentos, cambia la ñ por n, etc
    var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
    var to = "aaaaeeeeiiiioooouuuunc------";

    for (var i = 0, l = from.length; i < l; i++) {
        str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // quita caracteres invalidos
        .replace(/\s+/g, '-') // reemplaza los espacios por -
        .replace(/-+/g, '-'); // quita las plecas

    return $("#slug").val(str);
}
