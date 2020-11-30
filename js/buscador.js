function obtenerDatos() {
    let ciudadForm = document.getElementsByName('ciudad')[0].value;
    let tipoForm = document.getElementsByName('tipo')[0].value;
    if (!(ciudadForm === "") || !(tipoForm === "")) {
        // Ocultamos los datos anteriores
        document.getElementsByClassName('tarjeta')[0].style.display = 'none';
        // Insertamos los datos en el div
        traerDatos(ciudadForm, tipoForm);
    } else {
        document.getElementsByClassName('tarjeta')[0].style.display = 'block';
    }
}

function traerDatos(ciudadForm, tipoForm) {
    const xhttp = new XMLHttpRequest;
    xhttp.open('POST', './data-1.json', true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            let datos = JSON.parse(this.response);
            let busqueda = document.querySelector('#busqueda');
            let numResultados = document.querySelector('#numResultados');
            busqueda.innerHTML = '';
            numResultados.innerHTML = '';
            var i = 0;

            for (let dato of datos) {
                if (dato.Ciudad === ciudadForm) {
                    if (dato.Tipo === tipoForm) {
                        var i = i + 1;
                        busqueda.innerHTML += `
                    <div id="${dato.Id}">
                        <div class="col s3 imagen">
                            <img src="./img/home.jpg" width="100px">
                        </div>
                        <div class="col s9">
                            Direccion: ${dato.Direccion}<br>
                            Ciudad: ${dato.Ciudad}<br>
                            Telefono: ${dato.Telefono}<br>
                            Codigo_Postal: ${dato.Codigo_Postal}<br>
                            Tipo: ${dato.Tipo}<br>
                            Precio: ${dato.Precio}<br>
                        </div>
                    </div>
                    <hr>`
                    }
                }
                numResultados.innerHTML = i;
                if (dato.Tipo === tipoForm) {
                    busqueda.innerHTML += `<br> ${dato.Tipo}`;
                }
            }
        }
    }
}