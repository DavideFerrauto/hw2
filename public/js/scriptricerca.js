/* TODO: inserite il codice JavaScript necessario a completare il MHW! */

const CHECKED_IMAGE = './images/checked.png';
const UNCHECKED_IMAGE = "./images/unchecked.png";

function unchecked(container)
{
    console.log(container)
    const boxes = document.querySelectorAll('.choice-grid div');
    for (const box of boxes) 
    {
       // console.log(box)
        if(box.dataset.choiceId != container.dataset.choiceId || box.dataset.questionId != container.dataset.questionId)
        {
            
            const img = box.querySelector('.checkbox');
           
            if(box.dataset.questionId == container.dataset.questionId)
            {
                box.classList.add("opacity");
                img.src=UNCHECKED_IMAGE;
                box.classList.remove('checked')
            }
         // img.classList.remove('hidden');

          
        }
    }
}
function calcolaRisultato()
{
    let a=0;
    for(let valore in result)
    {
     if(result[valore]!==null)
        a++;
    }
    if(a==3)
    {
        for (const box of boxes)
        {
        box.removeEventListener('click', changeToChecked);
        }
        //console.log(result.one)
         if(result.three === result.two){      
            personality=result.two;
        }else{
            personality=result.one;
        }
        mostraRisultato()
        
    }

}

function mostraRisultato()
{
    const esito= document.querySelector('#esito')
    esito.style.display="Block";
    const titolo= document.querySelector("#title")
    
    titolo.textContent=RESULTS_MAP[personality].title;

    const sezione= document.querySelector("#contents")
    sezione.textContent=RESULTS_MAP[personality].contents;

}
function createImage(src)
{
const image= document.createElement('img');
image.src=src;
return image;
}

function onModalClick()
{
    modalView.classList.add('hidden');
    document.body.classList.remove('no-scroll')
    modalView.innerHTML='';
}

function changeToChecked(event)
{
    const image=createImage(event.target.src)
    modalView.style.top=window.pageYOffset+'px';
    document.body.classList.add('no-scroll');
    modalView.appendChild(image);
    modalView.classList.remove('hidden');
 
    const container = event.currentTarget; //div
    container.classList.add('checked')
    const imageU = container.querySelector('.checkbox');
    //imageU.classList.add('hidden');
 imageU.src= CHECKED_IMAGE;
 container.classList.remove("opacity")
 let valore=container.dataset.questionId
 result[valore]=container.dataset.choiceId;
 calcolaRisultato()
 
 //versione non ok
 //const image = document.createElement('img');
  //image.src = CHECKED_IMAGE;
  //image.classList.add('checkbox');
    //container.appendChild(image);
 // container.removeEventListener("click", changeToChecked);
    unchecked(container);

}
function reset()
{
   // history.go(0) o reload
   //metodo senza effetivamente caricare la pagina
delete result.one
delete result.two
delete result.three
const boxes = document.querySelectorAll('.choice-grid div');
    for (const box of boxes)
    {
        const img = box.querySelector('.checkbox');
        img.src=UNCHECKED_IMAGE;
        box.classList.remove("opacity")
        box.classList.remove('checked')
        box.addEventListener('click', changeToChecked);


    }
    const esito= document.querySelector('#esito')
    esito.style.display="none";

}

const boxes = document.querySelectorAll('.choice-grid div');
const modalView= document.querySelector('#modal-view');
modalView.addEventListener('click',onModalClick);
for (const box of boxes)
{
  box.addEventListener('click', changeToChecked);
}
const result ={};
let personality='';
const button = document.querySelector('button')
button.addEventListener('click',reset)

 