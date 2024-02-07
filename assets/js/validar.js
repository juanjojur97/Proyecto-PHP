//entrar al formulario
const formulario = document.getElementById("registro");

//acceso a todos los inputs
const nombre = document.getElementById("user_name");
const apellidos = document.getElementById("user_apellidos");
const email = document.getElementById("user_email");

// Acceso a la comprobación de la validación del formulario
let valida = {
    nombre:false,
    apellidos:false,
    email:false
}

// Envío del formulario
formulario.addEventListener("submit",(e)=>{
   
    if(Object.values(valida).every(value => value)) {
        // Todos los campos han pasado la validación, permite el envío del formulario.
    } else {
        e.preventDefault(); // Evita el envío del formulario si no se han pasado todas las validaciones.
    }

})

// Validación del nombre
nombre.addEventListener("blur",()=>{
    let name_re = /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{2,30}$/;

    if(nombre.value == null || nombre.value == ""){
        setErrorFor(nombre,"Error. No puede dejar el nombre en blanco.");
        valida.nombre = false;
    }else{
        if(!name_re.exec(nombre.value)){
            setErrorFor(nombre,"Error. El nombre sólo puede estar formado por letras y contener entre 2 y 30 caracteres.");
        }else{
            setSuccessFor(nombre);
            valida.nombre = true;
        }
    }
    console.log(valida.nombre);
})


// Validación de los apellidos
apellidos.addEventListener("blur",()=>{
    let name_re = /^[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]{2,50}$/;
    
    if(apellidos.value == null || apellidos.value == ""){
        setErrorFor(apellidos,"Error. No puede dejar los apellidos en blanco.");
        valida.apellidos = false;
    }else{
        if(!name_re.exec(apellidos.value)){
            setErrorFor(apellidos,"Error. El apellido sólo puede estar formado por letras y contener entre 2 y 30 caracteres.");
        }else{
            setSuccessFor(apellidos);
            valida.apellidos = true;
        }
    }
    console.log(valida.apellidos);
    
})

// Validación del teléfono

// Validacion del email
email.addEventListener("blur",()=>{
    let email_re = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    
    if(email.value == null || email.value == ""){
        setErrorFor(email,"Error. No puede dejar el email en blanco.");
        valida.email = false;
    }else{
        if(!email_re.exec(email.value)){
            setErrorFor(email,"Error. El email es incorrecto.");
        }else{
            setSuccessFor(email);
            valida.email = true;
        }
    }
    console.log(valida.email);
    
})


console.log(valida);
// Mensaje de error
function setErrorFor(input,message){
    const formControl = input.parentElement;
    const small = formControl.querySelector("small")
    small.innerText = message;
    formControl.className = "form-control error";
}


//si todo esta correcto
function setSuccessFor(input){
    const formControl =input.parentElement;
    formControl.className = "form-control success";
}
