function aggiungiCarrello(event){
    button=event.currentTarget;
    

    const u = button.dataset.id;
    swal("Ben fatto!","Hai aggiunto al carrello!", "success");
    fetch(CARRELLO_ROUTE+"/acquista/"+encodeURIComponent(u)).then(responseAggiorna);

   
   
    
    // Aggiorno i listener
    button.removeEventListener('click', aggiungiCarrello);
}



function updateLikes(json) {
   
    if (!json.ok) return null;
    //alert(json.nlikes);
    const tot=document.querySelector(".par"+json.id);
    tot.textContent="Like:"+json.nlikes;
    
}

function aggiungiLike(event)
{
 //// event.target.classList.add("hidden");
  //event.target.src="images/cuorepieno.png";
 
 like = event.currentTarget;
 const u=like.dataset.id;
 fetch(HOME_ROUTE+"/aggiungiLike/"+encodeURIComponent(u)).then(responseAggiorna).then(function (json){ return updateLikes(json); });

/*
    const formData = new FormData();
    // Prendo l'ID del post
   // alert(like.dataset.id);
    var _token = "{{ csrf_token }}";
    formData.append('idlibro', like.dataset.id);
   
    // Mando l'ID alla pagina PHP tramite fetch
    
    fetch(HOME_ROUTE+"/aggiungiLike", {method: 'post',headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
        'Content-Type': 'application/json',
    }, body: formData}).then(responseAggiorna)
    .then(function (json){ return updateLikes(json); });
*/
    like.src="images/cuorepieno.png";
   

    // Aggiorno i listener
    like.removeEventListener('click', aggiungiLike);
    like.addEventListener('click', unlikePost);
  
    book[u]=true;
}


function unlikePost(event)
{
    
 like = event.currentTarget;

const u= like.dataset.id;
 
 fetch(HOME_ROUTE+"/unlike/"+encodeURIComponent(u)).then(responseAggiorna)
 .then(function (json){ return updateLikes(json); });

 like.src="images/cuorevuoto.png";
 // Cambio la classe del bottone
//  like.classList.remove('like');
//  like.classList.add('liked');

 // Aggiorno i listener
 like.removeEventListener('click', unlikePost);
  like.addEventListener('click', aggiungiLike);
  
    book[u]=false;
}


book = new Array();

function caricaLike(json){

    
   // alert("dentro carica");
    
    for(evento of json)
    {
      //  alert(evento.libro);

        if(evento.connesso == true)
        visibile=true;
        else 
        visibile=false;

        book[evento.libro]=true;
    }
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
        const dettagli=document.createElement("div");
        const autore = document.createElement("div");
        const costo = document.createElement("div");


        const barra = document.createElement("div");
        barra.classList.add("item");
        barra.classList.add("liked");

        const button=document.createElement("button");
        button.textContent="Acquista";
        button.classList.add("item");
       // button.classList.add("but"+evento.id);
        button.addEventListener("click",aggiungiCarrello);
        button.setAttribute("data-id",evento.id);

        const nlikes=document.createElement("p");
        nlikes.classList.add("par"+evento.id)

        nlikes.textContent="Like:"+evento.likes;
        const like=document.createElement("img");
       
        
        like.src="images/cuorevuoto.png";
        nlikes.setAttribute("data-tot",evento.id);
        like.setAttribute("data-id",evento.id);
        
       
        like.addEventListener("click",aggiungiLike);
      
       
        if(book[evento.id]==true)
        {
            //alert("dentro if");
   //     const likev=document.createElement("img");
        like.src="images/cuorepieno.png";
        like.removeEventListener("click",aggiungiLike);
        like.addEventListener('click', unlikePost);
  
        }
        


        barra.appendChild(like);
        barra.appendChild(nlikes);
        
       
       
        
        titolo.textContent = "Titolo:  "+evento.titolo;
        dettagli.textContent="Dettagli:  "+evento.dettagli;
        autore.textContent = "Autore:  "+evento.autore;
        costo.textContent = "Costo:  "+evento.costo+" €";
        dettagli.classList.add("dati");
        titolo.classList.add("dati");
        costo.classList.add("dati");
        autore.classList.add("dati");
        
        
        
        att.appendChild(titolo);
        att.appendChild(autore);
        att.appendChild(dettagli);
        att.appendChild(costo);

        att.appendChild(barra);
        

        if(visibile!=true)
        barra.classList.add("hidden");
        else{
        barra.classList.remove("hidden");
        att.appendChild(button);
        }
        item.appendChild(att);
        container.appendChild(item);

    
    }
}
function responseAggiorna(response)
{
    if (!response.ok ) {return null};
    return response.json();
}
function impostalike()
{
    //const richiesta2= "fetch_likes.php";
    fetch(HOME_ROUTE+"/caricaLike").then(responseAggiorna).then(caricaLike);

}
function caricacontenuto(g=1)
{
   
    //const richiesta= "caricahome.php?genere="+g;
   

    fetch(HOME_ROUTE+"/caricaHome/"+encodeURIComponent(g)).then(responseAggiorna).then(onJSON);
}
let visibile=false;
impostalike();

caricacontenuto();




document.querySelector("#gen1").addEventListener("click",function(){
    caricacontenuto(1);  
});
document.querySelector("#gen2").addEventListener("click",function(){
    caricacontenuto(2);  
});
document.querySelector("#gen3").addEventListener("click",function(){
    caricacontenuto(3);  
});