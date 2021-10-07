const navSlide = () => {
    const burguer = document.querySelector('.nav-burguer')
    const nav = document.querySelector('.menu')
    const li = document.querySelectorAll('.menu li')

    burguer.addEventListener("click", ()=>{
        nav.classList.toggle('nav-ativo')

        li.forEach((link, index)=>{
            if(link.style.animation) {
                link.style.animation = ''
            }
            else {
                link.style.animation = `navLinkFade 1s ease forwards ${index / 7 + 0.5}s`
            }
        })
    })
    
}

const menu = document.querySelector(".nav-menu");

document.addEventListener("scroll", () => {

  if (document.documentElement.scrollTop > 590)
    menu.classList.add("nav-alt");
  else
    menu.classList.remove("nav-alt");

});

navSlide()