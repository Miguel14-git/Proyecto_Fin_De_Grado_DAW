document.getElementById("fichero").addEventListener("change",Fichero,true);

function Fichero(ev) {
   var fich = ev.target;
   var lector = new FileReader();
   
   lector.onload = function(){
       var alumnos = JSON.parse(lector.result);
       var lista = document.getElementById("lista_alumnos");

       console.log(alumnos);

       for(var elemento of alumnos){
        var li = document.createElement("li");
        li.classList.add("list-group-item");
        lista.appendChild(li);
        li.append("Id_Alumno :" + " " + elemento.ID + " , " + "Nombre : "+ " " + elemento.Nombre + " , " + "Usuario : "+ " " + elemento.Usuario);
        //li.append(elemento.Nombre);
       
       }
   }

   lector.readAsText(fich.files[0]);
}