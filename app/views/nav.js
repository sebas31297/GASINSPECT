


                                                                        ///////////BARRA DE NAVEGACIÓN///////////////////////////////////////////////////
   
    // Carga el contenido de nav.html dentro del div con id "navbar"
    
    fetch("nav.html")  // Asegúrate de que la ruta es correcta
        .then(response => response.text())
        .then(data => {
            document.getElementById("navbar").innerHTML = data;
        })
        .catch(error => console.error("Error al cargar nav.html:", error));











document.addEventListener('DOMContentLoaded', () => {//////////////////////////////////FUNCION QUE EJECUTARÁ LOS CALENDARIOA///////////////////////////////////////////////////





    //////////////////////////////////////////////////////// CALENDARIO AGENDA///////////////////////////////////////////////////

    //elementos del calendario-agenda
    const updateCalendarAgenda = () => {
        const monthYearElement = document.getElementById('monthYearAgenda');//elemento constante del DOM que muestra el mes y el año actal
        const datesElement = document.getElementById('datesAgenda');//elemento constante del DOM que muestra las fechas del calendario
        const prevBtn = document.getElementById('prevBtnAgenda');//botón para ir hacia atrás
        const nextBtn = document.getElementById('nextBtnAgenda');//botón para ir hacia adelante

        // Verificar que los elementos existen
        if (!monthYearElement || !datesElement || !prevBtn || !nextBtn) {//condicional que expresa que si los elementos ()) no existen se mostrará el mensaje
            console.log('Calendario Agenda no encontrado.');//mensaje
            return;//retorno
        }

        let currentDate = new Date();//creación de la variable currentdate, donde alojará al objeto Date(fecha y hora actual)

        const updateCalendarView = () => {//actalización de la fecha y hora cada vez que cargue la pagina
            const currentYear = currentDate.getFullYear();//año actual
            const currentMonth = currentDate.getMonth();//mes actual

            const firstDay = new Date(currentYear, currentMonth, 1);//crea un nuevo objeto date que representa el primer dia del mes actual
            const lastDay = new Date(currentYear, currentMonth + 1, 0);//crea un nuevo objeto date que representa el ultimo dia del mes actual
            const totalDays = lastDay.getDate();//elemento que con la función getDay, crea el total de dias del mes del año actual
            const firstDayIndex = firstDay.getDay();//función para declarar en que dia de la semana cae la primer fecha del mes
            const lastDayIndex = lastDay.getDay();//función para declarar en que dia de la semana cae la ultimo fecha del mes

            const monthYearString = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });//crea el elemento monthyearstring que muestra totalmente el mes y año actual 
            monthYearElement.textContent = monthYearString;//convierte la fecha en letras (abril de 2025)

            let datesHTML = '';//inicialización de una cadena vacía donde irán las fechas del mes

            // Llenar días previos (vacíos)
            for (let i = firstDayIndex; i > 0; i--) {//un para, que hace que los dias del mes pasado, antes del priemr dia del mes se muestren
                const prevDate = new Date(currentYear, currentMonth, 0 - i + 1);//calculo para obtener el dia ultimo exacto del mes anterior
                datesHTML += `<div class="date inactive">${prevDate.getDate()}</div>`;//muestra el ultimo dia del mes anterior
            }

            // Llenar días del mes actual
            for (let i = 1; i <= totalDays; i++) {//sumatoria a partir del primer dia hasta el ultimo del mes
                const date = new Date(currentYear, currentMonth, i);//se posiciona en la fecha que corresponde al dia actual
                const activeClass = date.toDateString() === new Date().toDateString() ? 'active' : '';//verificacion si corresponde la fecha al dia actual
                datesHTML += `<div class="date ${activeClass}">${i}</div>`;//muestra en el html el dia y fecha actual
            }

            // Llenar días siguientes (vacíos)
            for (let i = 1; i <= 7 - lastDayIndex; i++) {//un para, que hace que los dias del mes siguiente, s se muestren
                const nextDate = new Date(currentYear, currentMonth + 1, i);//calculo para obtener el primer dia exacto del mes siguiente
                datesHTML += `<div class="date inactive">${nextDate.getDate()}</div>`;//muestra en pantalla 
            }

            datesElement.innerHTML = datesHTML;//contenedor donde se mostrará la cadena de dates o fechas
        };

        prevBtn.addEventListener('click', () => {//boton previo
            currentDate.setMonth(currentDate.getMonth() - 1);//funcion dirige hacia el mes anterior
            updateCalendarView();//actualiza el calendario despues de haber operado el boton
        });

        nextBtn.addEventListener('click', () => {//boton siguiente
            currentDate.setMonth(currentDate.getMonth() + 1);//funcion dirige hacia el mes siguiente
            updateCalendarView();//actualiza el calendario despues de haber operado el boton
        });

        updateCalendarView();//actualiza el calendario despues de haber operado todas sus funciones 
    };




    // /////////////////////////////////////////////////////////////CALENDARIO REGISTRO/////////////////////////////////////////////////////////

    const updateCalendarRegistro = () => {
        const monthYearElement = document.getElementById('monthYearRegistro');//elemento constante del DOM que muestra el mes y el año actal
        const datesElement = document.getElementById('datesRegistro');//elemento constante del DOM que muestra las fechas del calendario
        const prevBtn = document.getElementById('prevBtnRegistro');//botón para ir hacia atrás
        const nextBtn = document.getElementById('nextBtnRegistro');//botón para ir hacia adelante

        // Verificar que los elementos existen
        if (!monthYearElement || !datesElement || !prevBtn || !nextBtn) {//condicional que expresa que si los elementos ()) no existen se mostrará el mensaje
            console.log('Calendario Registro no encontrado.');//mensaje
            return;
        }

        let currentDate = new Date();//creación de la variable currentdate, donde alojará al objeto Date(fecha y hora actual)

        const updateCalendarView = () => {//actalización de la fecha y hora cada vez que cargue la pagina
            const currentYear = currentDate.getFullYear();//año actual
            const currentMonth = currentDate.getMonth();//mes actual

            const firstDay = new Date(currentYear, currentMonth, 1);//crea un nuevo objeto date que representa el primer dia del mes actual
            const lastDay = new Date(currentYear, currentMonth + 1, 0);//crea un nuevo objeto date que representa el ultimo dia del mes actual
            const totalDays = lastDay.getDate();//elemento que con la función getDay, crea el total de dias del mes del año actual
            const firstDayIndex = firstDay.getDay();//función para declarar en que dia de la semana cae la primer fecha del mes
            const lastDayIndex = lastDay.getDay();//función para declarar en que dia de la semana cae la ultimo fecha del mes

            const monthYearString = currentDate.toLocaleString('default', { month: 'long', year: 'numeric' });//crea el elemento monthyearstring que muestra totalmente el mes y año actual
            monthYearElement.textContent = monthYearString;//convierte la fecha en letras (abril de 2025)

            let datesHTML = '';//inicialización de una cadena vacía donde irán las fechas del mes

            // Llenar días previos (vacíos)
            for (let i = firstDayIndex; i > 0; i--) {//un para, que hace que los dias del mes pasado, antes del priemr dia del mes se muestren
                const prevDate = new Date(currentYear, currentMonth, 0 - i + 1);//calculo para obtener el dia ultimo exacto del mes anterior
                datesHTML += `<div class="date inactive">${prevDate.getDate()}</div>`;//muestra en pantalla el resultado
            }

            // Llenar días del mes actual
            for (let i = 1; i <= totalDays; i++) {//sumatoria a partir del primer dia hasta el ultimo del mes
                const date = new Date(currentYear, currentMonth, i);//se posiciona en la fecha que corresponde al dia actual
                const activeClass = date.toDateString() === new Date().toDateString() ? 'active' : '';//verfiica si está en el dia actual
                datesHTML += `<div class="date ${activeClass}">${i}</div>`;//muestra en el html el dia y fecha actual
            }

            // Llenar días siguientes (vacíos)
            for (let i = 1; i <= 7 - lastDayIndex; i++) {//un para, que hace que los dias del mes siguiente, s se muestren
                const nextDate = new Date(currentYear, currentMonth + 1, i);//calculo para obtener el primer dia exacto del mes siguiente
                datesHTML += `<div class="date inactive">${nextDate.getDate()}</div>`;//muestra en pantalla 
            }

            datesElement.innerHTML = datesHTML;//contenedor donde se mostrará la cadena de dates o fechas
        };

        prevBtn.addEventListener('click', () => {//boton previo
            currentDate.setMonth(currentDate.getMonth() - 1);//funcion dirige hacia el mes anterior
            updateCalendarView();//actualiza el calendario despues de haber operado el boton
        });

        nextBtn.addEventListener('click', () => {//boton siguiente
            currentDate.setMonth(currentDate.getMonth() + 1);//funcion dirige hacia el mes siguiente
            updateCalendarView();//actualiza el calendario despues de haber operado el boton
        });

        updateCalendarView();//actualiza el calendario despues de haber operado todas sus funciones
    };


 




        // //////////////////////////////////////////////////////////////////////////////FULLCALENDAR ////////////////////////////////////////////////////////////
        const calendarEl = document.getElementById('calendar');//referencia al elemento calendar del archivo html

        // Verificamos que exista el contenedor del calendario
        if (calendarEl) {//condicional: si el elemento calendario existe en html:
            const eventTypeSelect = document.getElementById('eventType');//referencia a los eventos del campo de selección
            let selectedEventType = eventTypeSelect ? eventTypeSelect.value : 'default';//selección de un evento
    
            if (eventTypeSelect) {//condicional: si el elemento campo de seleccion existe en html:
                eventTypeSelect.addEventListener('change', function() {//permite cambiar el valor seleccionado
                    selectedEventType = eventTypeSelect.value;//funcion que actualiza el valor predeterminado según el valor seleccionado
                });
            }
    
            const calendar = new FullCalendar.Calendar(calendarEl, {//declaración de un  calendario-fullcalendar, 
                locale: 'es',//idioma español
                initialView: 'timeGridWeek', //visualización de cuadricula del calendario según los dias de la semana
                allDaySlot: false, //desactiva el bloque de 24 horaas
                slotDuration: '01:00:00',//duración de cada intervalo temporal
                slotMinTime: '07:00:00',//hora inicial
                slotMaxTime: '21:00:00',//hora final
                slotMinHeight: 120,//tamaño-altura de cuadriculas
                slotLabelFormat: {//etiquetas del tiempo
                    hour: 'numeric',//muestra la hora en numero
                    minute: '2-digit',//dos digitos en minutos
                    hour12: false//hora militar
                },
                contentHeight: 'auto',//ajusta automaticamente la altura del header
                headerToolbar: {//container para elementos del header
                    left: 'timeGridWeek,timeGridDay',//a la izquierda, boton de fechas semanales, boton de fecha individual
                    center: 'title',//titulo de la fecha
                    right: 'prev,next'//botones (previo y siguiente)
                },
                buttonText: {
                    timeGridDay: 'Día',//texto del boton(dia)
                    timeGridWeek: 'Semana'//texto del boton(semana)
                },
                titleFormat: {//formato del titulo del calendario
                    month: 'long',//formato textual del mes
                    year: 'numeric'//formato numérico del año
                },
                dayHeaderContent: function(arg) {//declaracion de funcion que ejecutará el header(encabezado)
                    const dayName = arg.date.toLocaleDateString('es-ES', { weekday: 'long' });//función que declara los dias de la semana en español
                    const dayNumber = arg.date.getDate();//funcion que declara la fecha que corresponde a los dias de la semana
                    return {//muestra en pantalla: centra los elementos, declara los dias, declara las fechas en el header del calendario en el archivo html
                        html: `<div style="text-align: center;">
                                  <div>${dayName}</div>
                                  <div>${dayNumber}</div>
                               </div>`
                    };
                },
                events: [],//lista de eventos
                firstDay: 1,//primer dia de la semana (lunes)
                slotLabelContent: function(arg) {//función para etiquetar la hora cada cuadricula 
                    if (arg.date.getHours() === 0 && arg.date.getMinutes() === 0) {//condicional. si es medianoche:
                        return { html: '<div style="text-align: center; font-weight: bold;">medianoche</div>' };//mostrará en pantalla que es medianoche
                    }
                    return { html: `${arg.date.getHours()}:${arg.date.getMinutes() < 10 ? '0' : ''}${arg.date.getMinutes()}` };//desarrollo del horario normal si no se cumple la condicional
                },
                dateClick: function(info) {//funcioón que reacciona al click en una fecha
                    if (!selectedEventType || selectedEventType === 'default') {//condicional que verifica si se ha seleccionado un evento
                        alert("Por favor, seleccione un tipo de inspección.");//mensaje, al no haber seleccionado un evento
                        return;
                    }
    
                    let eventTitle = '';//declara una variable con el titulo del evento
                    let color = '';//declara una variable con el color del evento
    
                    switch (selectedEventType) {//realiza una serie de condiciones paradeterminar que evento fue el seleccionado
                        case 'lightblue'://si el caso lightblue fue seleccionado:
                            eventTitle = 'Insp Agendada';//selecciona su titulo predeterminado
                            color = 'lightblue';//selecciona su color predeterminado
                            break;//salir del caso en caso de no ser el escogido
                        case 'red'://caso 2
                            eventTitle = 'Insp Rechazada';
                            color = 'red';
                            break;
                        case 'orange'://caso 3
                            eventTitle = 'Insp en Proceso';
                            color = '#FFA500';
                            break;
                        case 'green'://caso 4
                            eventTitle = 'Insp Completada';
                            color = 'green';
                            break;
                    }
    
                    calendar.addEvent({//agregación de evento en cuadricula cuando el usuario hace click
                        title: eventTitle,//se agrega el titulo
                        start: info.dateStr,//se agrega en el inicio de su fecha respectiva
                        end: info.dateStr,//se agrega el final de su agendamiento
                        color: color//el color quje caracteriza al evento
                    });
                },
                eventClick: function(info) {//funcion para elimnar un evento
                    if (confirm("¿Estás seguro de que quieres eliminar este evento?")) {//mensaje de verificacion
                        info.event.remove();//elimina el evento
                    }
                }
            });
    
            calendar.render();//actualiza el fullcalendar
        }

    //inicialización de dos calendarios
    updateCalendarAgenda();//actualiza el primer calendario de la ventana agenda
    updateCalendarRegistro();//actualiza el calendario de registro de inspección
    

});//fin de la primera funcion de compilar los calendarios. 3 en total









 //////////////////////////////////////////////////////////////////////////////////////FULLCALCULATOR///////////////////////////////////////////////////

let currentInput = '';  // El número o expresión actual
let operator = null;     // El operador que se va a usar
let previousInput = '';  // El número antes del operador
let hasDecimal = false;  // Para controlar el punto decimal
let memory = 0;          // Memoria de la calculadora

function appendNumber(number) {
    currentInput += number; // Añade el número al input
    updateDisplay(); // Actualiza el display
}

function setOperator(op) {
    if (currentInput === '') return; // Evita agregar operador sin número

    // Si ya tenemos un operador, realiza el cálculo antes de agregar el nuevo operador
    if (previousInput !== '') {
        calculateResult();
    }

    operator = op; // Almacena el operador
    previousInput = currentInput;  // Guarda el número antes del operador
    currentInput = ''; // Limpia la entrada actual para ingresar el siguiente número
    updateDisplay(); // Actualiza el display con la operación
}

function calculateResult() {
    if (operator === null || currentInput === '') return;

    let result; // Variable para almacenar el resultado
    const prev = parseFloat(previousInput);

    try {
        currentInput = eval(currentInput); // Evalúa la expresión de currentInput
    } catch (e) {
        alert("Error: Expresión inválida");
        return;
    }

    switch (operator) {
        case '+':
            result = prev + parseFloat(currentInput);
            break;
        case '-':
            result = prev - parseFloat(currentInput);
            break;
        case '*':
            result = prev * parseFloat(currentInput);
            break;
        case '/':
            if (parseFloat(currentInput) === 0) {
                alert("Error: División por cero");
                return;
            }
            result = prev / parseFloat(currentInput);
            break;
        default:
            return;
    }

    currentInput = result.toString(); // Actualiza el input con el resultado
    operator = null; // Borra el operador después de la operación
    previousInput = ''; // Limpia el número anterior
    updateDisplay(); // Muestra el resultado en el display
}

// Función para limpiar toda la pantalla
function clearDisplay() {
    currentInput = '';
    previousInput = '';
    operator = null;
    hasDecimal = false;
    updateDisplay();
}

// Función para limpiar solo la entrada actual
function clearEntry() {
    currentInput = '';
    hasDecimal = false;
    updateDisplay();
}

// Función para agregar el punto decimal
function appendDecimal() {
    if (!hasDecimal) {
        currentInput += '.';
        hasDecimal = true;
        updateDisplay();
    }
}

// Función para la raíz cuadrada
function calculateSquareRoot() {
    if (currentInput === '') return;
    const num = parseFloat(currentInput);
    currentInput = Math.sqrt(num).toString();
    updateDisplay();
}

// Función para calcular el porcentaje
function calculatePercentage() {
    if (currentInput === '') return;
    const num = parseFloat(currentInput);
    currentInput = (num / 100).toString();
    updateDisplay();
}

// Función para almacenar el número en memoria
function memoryStore() {
    memory = parseFloat(currentInput);
}

// Función para sumar a la memoria
function memoryAdd() {
    memory += parseFloat(currentInput);
}

// Función para restar de la memoria
function memorySubtract() {
    memory -= parseFloat(currentInput);
}

// Función para mostrar el valor de la memoria
function memoryRecall() {
    currentInput = memory.toString();
    updateDisplay();
}

// Función para actualizar el display con la operación
function updateDisplay() {
    if (operator === null && previousInput === '') {
        document.getElementById('displayCalc').value = currentInput;
    } else {
        document.getElementById('displayCalc').value = previousInput + ' ' + operator + ' ' + currentInput;
    }
}

// Función para borrar una unidad
function deleteLastCharacter() {
    if (currentInput.length > 0) {
        const lastChar = currentInput.slice(-1);
        currentInput = currentInput.slice(0, -1); // Elimina el último carácter de la cadena

        // Si el último carácter eliminado fue un operador, lo restablecemos para que pueda ser editado
        if (['+', '-', '*', '/'].includes(lastChar)) {
            operator = null; // Resetea el operador
        }

        updateDisplay();
    }
}

