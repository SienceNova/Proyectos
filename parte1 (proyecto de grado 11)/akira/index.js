// funcion para enviar los mensajes de akira

const btn = document.getElementById("send-btn");

document.addEventListener('keydown', function(event){

    if(event.key === 'Enter'){

        btn.click();

    }

});