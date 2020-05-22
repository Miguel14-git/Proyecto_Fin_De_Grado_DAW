var canvas = document.getElementById("canvas");
var context = canvas.getContext("2d");

function Estadisticas(estadisticas){
    var puntox = 15;
    var puntoy = 380;
    var ancho = 50;
    var altura = 0;
    context.lineWidth = 2;
    context.strokeStyle = coloresAleatorios();
    context.beginPath();
    context.moveTo(0,180);
    context.lineTo(900,180);
    context.stroke();
    context.fillStyle=coloresAleatorios();
    context.font="12px monospace";
    context.fillText("media",715,170);
    
    for (let ele of estadisticas){
        altura = -ele.nota * 40;
        context.fillStyle = coloresAleatorios();
        context.globalAlpha=.3;
        context.fillRect(puntox,puntoy,ancho,altura);
        context.fillStyle="rgb(8,69,117)";
        context.font="15px monospace";
        context.fillText(ele.nombre,puntox,415);
        puntox += 75;
        
    }
}

function Numero(num){
	return (Math.random()*num).toFixed(0);
}

function coloresAleatorios(){
	var random = "("+Numero(255)+"," + Numero(255) + "," + Numero(255) +")";
	return "rgb" + random;
}
