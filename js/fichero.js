document.getElementById("fichero").addEventListener("change", subeFichero ,false);

        function subeFichero(e){
            var fichero = e.target;
            var lector = new FileReader();

            lector.onload = function (){
                datos = JSON.parse(lector.result);

                var estadisticas_tabla = document.querySelector("#cuerpo");
                estadisticas_tabla.innerHTML = "";
                for (let elemento of datos){
                    estadisticas_tabla.innerHTML += `
                    <tr>
                        <td>${elemento.nombre}</td>
                        <td>${elemento.nota}</td>
                    </tr>
                    `
                }

                Estadisticas(datos);
            }
            lector.readAsText(fichero.files[0]);
        }