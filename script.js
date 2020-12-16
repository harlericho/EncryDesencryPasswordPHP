

$("#btnLimpiar").click(function (e) {
    e.preventDefault();
    document.getElementById("txtTexto").value = "";
    document.getElementById("txtEncry").value = "";
    document.getElementById("txtDesencry").value = "";
    document.getElementById("txtTexto").focus();
    $.notify("Cree nuevo texto o clave", "info");
});
$("#btnGenerar").click(function (e) {
    e.preventDefault();
    if (_Validacion() == true) {
        let texto = $("#txtTexto").val();
        $.ajax({
            type: "POST",
            url: "proceso.php",
            data: "texto=" + texto,
            success: function (response) {
                response = JSON.parse(response);
                $("#txtEncry").val(response['encry']);
                $("#txtDesencry").val(response['desencry']);
                $.notify("Proceso realizado", "success");
            }
        });
    }
});


function _Validacion(params) {
    let texto = $("#txtTexto").val();
    if ($.trim(texto) == "") {
        $.notify("Ingrese texto o clave.", "warn");
        $("#txtTexto").focus();
    } else {
        return true;
    }
}