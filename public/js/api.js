//
function onJson(json) {
    console.log('JSON ricevuto');
    // Svuotiamo la libreria
    const library = document.querySelector('#library-view');
    library.innerHTML = '';
    // Leggi il numero di risultati
    let num_results = json.num_found;
    // Mostriamone al massimo 3
    if(num_results > 3)
      num_results = 3;
    // Processa ciascun risultato
    for(let i=0; i<num_results; i++)
    {
      // Leggi il documento
      const doc = json.docs[i]
      // Leggiamo info
      const title = doc.title;
      const author= doc.author_name;
      // Controlliamo ISBN
      if(!doc.isbn)
      {
        console.log('ISBN mancante, salto');
        continue;
      }
      const isbn = doc.isbn[0]; //possono essercene più di uno

      // Costruiamo l'URL della copertina
      const cover_url = 'http://covers.openlibrary.org/b/isbn/' + isbn + '-M.jpg';
      // Creiamo il div che conterrà immagine e didascalia
      const book = document.createElement('div');
      book.classList.add('book');
      // Creiamo l'immagine
      const img = document.createElement('img');
      img.src = cover_url;
      // Creiamo la didascalia
      const caption = document.createElement('span');
      caption.textContent ="Title: "+ title+ " Author: " + author;
      // Aggiungiamo immagine e didascalia al div
      book.appendChild(img);
      book.appendChild(caption);
      // Aggiungiamo il div alla libreria
      library.appendChild(book);
      
    }
  
    
  }


function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }


function search(event)
{
  // Impedisci il submit del form
  event.preventDefault();
  // Leggi valore del campo di testo
  const libro_input = document.querySelector('#libro');
  const libro_value = encodeURIComponent(libro_input.value);
  console.log('Eseguo ricerca: ' + libro_value);
  // Prepara la richiesta
  rest_url = 'http://openlibrary.org/search.json?title=' + libro_value;
  console.log('URL: ' + rest_url);
  // Esegui fetch
  fetch(rest_url).then(onResponse).then(onJson);
}

const form = document.querySelector('form');
form.addEventListener('submit', search)

