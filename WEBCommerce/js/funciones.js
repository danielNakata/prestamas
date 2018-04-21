/*archivo de funciones*/
var divs = ['clientesDiv','prestamosDiv', 'pagosDiv', 'estadisticosDiv'];

function muestraDiv(div){
    try{
        for(var i=0; i < divs.length; i++){
            var d = document.getElementById(divs[i]);
            d.style.visibility = 'hidden';
            d.style.height = '0px';
        }
        
        var d = document.getElementById(div);
        d.style.visibility = 'visible';
        d.style.height = 'auto';
    }catch(ex){
        console.log(ex.message);
    }
}