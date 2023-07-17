

function actor() {
  let btnActor = document.querySelectorAll(".cardActor__button");


 btnActor.forEach((btn) => {
    btn.addEventListener("click", () => {
        let parent = btn.parentNode;
        let active = document.querySelector(".activeActor");
        parent.classList.add("activeActor");

        if (active) {
            active.classList.remove("activeActor");
        }
    })

 })

}



 function prevCol() {
   let titles = document.querySelectorAll('.mesuresCol__title')
  let texts = document.querySelectorAll('.mesuresCol__content')
  let zoneText = document.querySelector(".mesuresCol")


  texts[0].style.display = 'block'
  titles[0].classList.add("titleActive")

  titles.forEach( (title, index) => {
  title.addEventListener('click', () => {
    zoneText.scrollIntoView({
      behavior: 'smooth',

    })
    let currentTitle = document.querySelector(".titleActive")
    if (currentTitle) {
      currentTitle.classList.remove("titleActive");
    }
    title.classList.add("titleActive");    
    texts.forEach( (text) => {
      text.style.display = 'none'
    })

    texts[index].style.display = 'block';

  })
})
}


function carrousel() {
  let prev = document.querySelector('.prev')
  let next = document.querySelector('.next')

  let circles = document.querySelectorAll('.circles .circle')

  circles[0].classList.add('activeCircle')

  let nbTem = document.querySelectorAll(".temoignages__item").length
  let largeurTem = document.querySelectorAll(".temoignages__item")[0].offsetWidth + 50

  let list = document.querySelector(".temoignages__list")

  list.style.width = largeurTem * nbTem +'px'

  let cpt = 0

  list.style.transition = 'transform .5s ease-in-out'

  next.addEventListener('click', () => {
      if(cpt<nbTem-1) {
          cpt++
          circles[cpt-1].classList.remove('activeCircle')
          circles[cpt].classList.add('activeCircle')

      } else {
          cpt=0
          circles[circles.length - 1].classList.remove('activeCircle')

          circles[0].classList.add('activeCircle')

      }
      list.style.transform = 'translateX(-'+cpt*largeurTem+'px)'
  
  })

  prev.addEventListener('click', () => {
      if(cpt>0) {
          cpt--
          circles[cpt+1].classList.remove('activeCircle')
          circles[cpt].classList.add('activeCircle')
      }else {
          cpt=nbTem-1
          circles[0].classList.remove('activeCircle')

          circles[circles.length - 1].classList.add('activeCircle')

      }
      list.style.transform = 'translateX(-'+cpt*largeurTem+'px)'

  })


  setInterval(() => {
    circles[cpt].classList.remove('activeCircle');
  
    if (cpt < nbTem - 1) {
      cpt++;
    } else {
      cpt = 0;
    }
  
    circles[cpt].classList.add('activeCircle');
    list.style.transform = 'translateX(-' + cpt * largeurTem + 'px)';
  }, 6000);
  

}

