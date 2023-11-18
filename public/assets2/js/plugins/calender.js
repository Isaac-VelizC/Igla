"use strict"

if (document.querySelectorAll('#calendar1').length) {
  document.addEventListener('DOMContentLoaded', function () {
    const btnGuardar = document.getElementById("btnGuardar");
    const btnEliminar = document.getElementById("btnEliminar");
    const btnModificar = document.getElementById("btnModificar");
    let formulario = document.querySelector("#formEventos");
    let calendarEl = document.getElementById('calendar1');
    let calendar1 = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      plugins: ["timeGrid", "dayGrid", "list", "interaction"],
      timeZone: "UTC",
      defaultView: "dayGridMonth",
      locale: 'es',
      displayEventTime:false,
      contentHeight: "auto",
      eventLimit: true,
      droppable: true,
      dayMaxEvents: 4,
      header: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,timeGridWeek"
      },
      
      events: baseUrl+"/calendar/mostrar",
      /*[
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: moment(new Date(), 'YYYY-MM-DD').add(-20, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Long Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-16, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            end: moment(new Date(), 'YYYY-MM-DD').add(-13, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(8,130,12,0.2)',
            textColor: 'rgba(8,130,12,1)',
            borderColor: 'rgba(8,130,12,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-14, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            color: '#047685',
            backgroundColor: 'rgba(4,118,133,0.2)',
            textColor: 'rgba(4,118,133,1)',
            borderColor: 'rgba(4,118,133,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-12, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-10, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(206,32,20,0.2)',
            textColor: 'rgba(206,32,20,1)',
            borderColor: 'rgba(206,32,20,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(-8, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Meeting',
            start: moment(new Date(), 'YYYY-MM-DD').add(-6, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(-5, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(-2, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },

        {
            title: 'Meeting',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T06:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T07:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T08:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            title: 'Doctor Meeting',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            title: 'All Day Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(8, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(10, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        }
      ],*/

      dateClick:function (info) {
        formulario.reset();
        $('#schedule-start-date').val(info.dateStr)
        $('#schedule-end-date').val(info.dateStr)
        btnEliminar.style.display = 'none';
        btnModificar.style.display = 'none';
        btnGuardar.style.display = 'block';
        $('#date-event').modal('show')
      },

      eventClick:function (info) {
        axios.post(baseUrl+"/calendar/"+info.event.id+"/evento/edit")
            .then((respuesta) => {
                formulario.id.value = respuesta.data.id;
                formulario.tipo_id.value = respuesta.data.tipo_id;
                formulario.title.value = respuesta.data.title;
                formulario.descripcion.value = respuesta.data.descripcion;
                formulario.start.value = respuesta.data.start;
                formulario.end.value = respuesta.data.end;
                btnEliminar.style.display = 'block';
                btnModificar.style.display = 'block';
                btnGuardar.style.display = 'none';
                $("#date-event").modal("show");
                calendar1.refetchEvents();
            })
            .catch(error => {
                const myAlert = $("#alertas");
                if (error.response && error.response.status === 422 && error.response.data.errors) {
                    const errores = error.response.data.errors;
                    Object.keys(errores).forEach((campo) => {
                        const mensajeError = errores[campo][0];
                        const campoInput = $(`#${campo}`);
                        campoInput.addClass("is-invalid");
                        campoInput.next('.invalid-feedback').html(mensajeError);
                    });
                } else if (error.response && error.response.data && error.response.data.error) {
                    myAlert.html('<div class="alert alert-left alert-danger alert-dismissible fade show mb-3 alert-fade" role="alert">' +
                        '<span>' + error.response.data.error + '</span>' +
                        '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>');
                }
            });
      }
  });
  calendar1.render();
    btnGuardar.addEventListener("click", function(event) {
        enviarDatos("/calendar/store", event);
    });
    btnEliminar.addEventListener("click", function(event) {
        enviarDatos("/calendar/"+ formulario.id.value +"/evento/delete", event);
    });
    btnModificar.addEventListener("click", function(event) {
        enviarDatos("/calendar/"+ formulario.id.value +"/evento/update", event);
    });

    function enviarDatos(url, event) {
        event.preventDefault();
        const datos = new FormData(formulario);
        const newUrl = baseUrl + url;
        axios.post(newUrl, datos)
            .then((respuesta) => {
                calendar1.refetchEvents();
                if (respuesta.data && respuesta.data.message) {
                    $("#myAlert").html('<div class="alert alert-left alert-success alert-dismissible fade show mb-3 alert-fade" role="alert">' +
                    '<span>' + respuesta.data.message + '</span>' +
                    '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '</div>');
                }
                $("#date-event").modal("hide");
            })
            .catch(error => {
                const myAlert = $("#alertas");
                if (error.response && error.response.status === 422 && error.response.data.errors) {
                    const errores = error.response.data.errors;
                    Object.keys(errores).forEach((campo) => {
                        const mensajeError = errores[campo][0];
                        const campoInput = $(`#${campo}`);
                        campoInput.addClass("is-invalid");
                        campoInput.next('.invalid-feedback').html(mensajeError);
                    });
                } else if (error.response && error.response.data && error.response.data.error) {
                    myAlert.html('<div class="alert alert-left alert-danger alert-dismissible fade show mb-3 alert-fade" role="alert">' +
                        '<span>' + error.response.data.error + '</span>' +
                        '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>' +
                        '</div>');
                }
            });
    }
  });
  
}