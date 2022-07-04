function rimuoviCarrello(event){
    
        button=event.currentTarget;
       
        const u = button.dataset.id;
        fetch(CARRELLO_ROUTE+"/rimuovi/"+encodeURIComponent(u)).then(responseAggiorna).then(caricacontenuto);
        
      
        
        swal("Non farlo..","Hai rimosso dal carrello!", "error");
       
        
        // Aggiorno i listener
        button.removeEventListener('click', rimuoviCarrello);
        
        caricacontenuto();
}


function onJSON(json)
{
    const container = document.querySelector('.container');
    container.innerHTML = '';
    for(evento of json)
    {
        
        const item = document.createElement("div");
        item.classList.add("item");
        const divimg = document.createElement("div");
        const img = document.createElement("img");
        img.src = evento.img;
        divimg.classList.add("imglibro");
        divimg.appendChild(img);
        item.appendChild(divimg);
        //container.appendChild(divimg);

        const att = document.createElement("div");
        att.classList.add("att");
        const titolo = document.createElement("div");
        
        const autore = document.createElement("div");
        const costo = document.createElement("div");


        const barra = document.createElement("div");
        barra.classList.add("item");
        barra.classList.add("liked");
 

        const button=document.createElement("button");
        button.textContent="Rimuovi";
       
      
        button.addEventListener("click",rimuoviCarrello);
        button.setAttribute("data-id",evento.id);
       

        titolo.textContent = "Titolo:  "+evento.titolo;
        
        autore.textContent = "Autore:  "+evento.autore;
        costo.textContent = "Costo:  "+evento.costo+" €";
       
        titolo.classList.add("dati");
        costo.classList.add("dati");
        autore.classList.add("dati");
        
        
        
        att.appendChild(titolo);
        att.appendChild(autore);
        
        att.appendChild(costo);
        att.appendChild(button);
        att.appendChild(barra);
        item.appendChild(att);
        container.appendChild(item);

       
    
    }
}
function responseAggiorna(response)
{
    if (!response.ok ) {return null};
    return response.json();
}

function caricacontenuto()
{
    
    fetch(CARRELLO_ROUTE+"/vedicarrello").then(responseAggiorna).then(onJSON);
}


caricacontenuto();



