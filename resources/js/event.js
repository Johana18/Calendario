import { default as axios } from "axios";

document.addEventListener('DOMContentLoaded', function() {

    let formulario = document.querySelector("form");

  var calendarEl = document.getElementById('event');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    
    initialView: 'dayGridMonth',

    locale:"es",

    //cabezera de la agenda
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek',
 
    },

    dateClick:function(info) {
        $("#evento").modal("show");         
    }

  }); 

  calendar.render();

  document.getElementById("btnGuardar").addEventListener("click",function(){
    const datos= new FormData(formulario);
    console.log(datos);
    console.log(formulario.title.value);

    axios.post("http://localhost/diary/public/event/agregar",datos).then(
      (respuesta) =>{
        $("#evento").modal("hide");
    }
    ).catch(
      error=>{
        if(error.response){
          console.log(error.response.data);
        }
      }
    )

  });

});
