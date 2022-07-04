const numResults = 3;

function onJson2(json) {
  console.log('JSON ricevuto');
  console.log(json);
  // Svuotiamo la libreria
  const library = document.querySelector('#library-view2');
  library.innerHTML = '';

  if (json.status == 400) {
	const errore = document.createElement("h1"); 
	const messaggio = document.createTextNode(json.detail); 
	errore.appendChild(messaggio); 
	library.appendChild(errore);
	return
  }
  
  const results = json.albums.items;
  
  if(results.length == 0)
  {
	const errore = document.createElement("h1"); 
	const messaggio = document.createTextNode("Nessun risultato!"); 
	errore.appendChild(messaggio); 
	library.appendChild(errore);
  }

  for(let i=0; i<numResults; i++)
  {
    // Leggi il documento
    const album_data = results[i]
    // Leggiamo info
    const title = album_data.name;
    const selected_image = album_data.images[0].url;
    // Creiamo il div che conterrà immagine e didascalia
    const album = document.createElement('div');
    album.classList.add('book');
    // Creiamo l'immagine
    const img = document.createElement('img');
    img.src = selected_image;
    // Creiamo la didascalia
    const caption = document.createElement('span');
    caption.textContent = title;
    // Aggiungiamo immagine e didascalia al div
    album.appendChild(img);
    album.appendChild(caption);
    // Aggiungiamo il div alla libreria
    library.appendChild(album);
  }

  
}





function onResponse(response) {
  console.log('Risposta ricevuta'+response);
  return response.json();
}



function search2(event)
{
	// Impedisci il submit del form
	event.preventDefault();
  
	// Leggi valore del campo di testo
	const content = document.querySelector('#libro2').value;
  
	// verifico che sia stato effettivamente inserito del testo
	if(content) 
	{
	    const text = encodeURIComponent(content);
		console.log('Eseguo ricerca elementi riguardanti: ' + text);
  		
			 // Esegui la richiesta
 	 fetch("ricerca/" + text, {
        headers : { 
          'Content-Type': 'application/json',
          'Accept': 'application/json'
         }
  
      }).then(onResponse).then(onJson2);
	}
	
		
}






// Aggiungo event listener al form1 per la RICERCA
const form2 = document.querySelector('#search_content');
form2.addEventListener('submit', search2)


  
  



