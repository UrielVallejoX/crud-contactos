function evalua(oNombre, oApePat, rbSexo, oFecha){
    var sErr="";
    var bRet = false;
    
        if (oNombre.disabled==false && oNombre.value=="")
            sErr= sErr + "\n Falta nombre";
    
        if (oApePat.disabled==false && oApePat.value=="")
            sErr= sErr + "\n Falta apellido paterno";
    
        if (rbSexo[0].checked==false && rbSexo[1].checked==false)
            sErr= sErr + "\n Falta indicar sexo";
    
        if (oFecha.disabled==false && oFecha.value=="")
            sErr= sErr + "\n Falta fecha de nacimiento";
        
        if (sErr == "")
            bRet = true;
        else
            alert(sErr);
        
        return bRet;
    }
    
    function mostrarMensaje({ mensaje, redireccion, imagen }) {
        const overlay = document.createElement('div');
        overlay.style.position = 'fixed';
        overlay.style.top = 0;
        overlay.style.left = 0;
        overlay.style.width = '30%';
        overlay.style.height = '30%';
        overlay.style.backgroundColor = 'rgba(219, 215, 237, 0.5)';
        overlay.style.display = 'flex';
        overlay.style.justifyContent = 'center';
        overlay.style.alignItems = 'center';
        overlay.style.zIndex = 1000;
    
        const popup = document.createElement('div');
        popup.style.background = '#fff';
        popup.style.padding = '60px';
        popup.style.borderRadius = '10px';
        popup.style.textAlign = 'center';
        popup.style.boxShadow = '0 0 10px rgba(141, 115, 115, 0.5)';
    
        const message = document.createElement('p');
        message.textContent = mensaje;
        message.style.fontFamily = 'monospace';
        message.style.fontSize = '25px';
    
        const imagenElem = document.createElement("img");
        imagenElem.src = imagen;
        imagenElem.alt = "Imagen de estado";
        imagenElem.width = 100;
        imagenElem.height = 100;
    
        const button = document.createElement('button');
        button.textContent = 'Regresar';
        button.style.marginTop = '10px';
        button.style.padding = '10px 20px';
        button.style.cursor = 'pointer';
        button.style.backgroundColor = 'rgb(14, 40, 160)';
        button.style.color = '#fff';
        button.style.border = 'none';
        button.style.borderRadius = '5px';
    
        button.addEventListener('click', function () {
            window.location.href = redireccion;
        });
    
        popup.appendChild(message);
        popup.appendChild(imagenElem);
        popup.appendChild(document.createElement('br'));
        popup.appendChild(button);
        overlay.appendChild(popup);
        document.body.appendChild(overlay);
    }