document.getElementById("formulario_plantilla").addEventListener("submit", function(event) {
    event.preventDefault();
    ValidarCorreo();
});

function ValidarCorreo() {
    let correo = document.getElementById("correo").value;
    let errorCorreo = document.getElementById("error_correo");
    
    // expresión regular para validar correo electrónico
    let regexCorreo = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    if (!regexCorreo.test(correo)) {
        errorCorreo.style.display = "inline";
    } else {
        errorCorreo.style.display = "none";
        alert("correo válido enviado correctamente.");
        // aquí puedes enviar el formulario si es válido
        // this.submit();
    }
}