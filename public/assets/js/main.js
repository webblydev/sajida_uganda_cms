$(document).ready(function(){
    $(" .wrapper-2 .slider").owlCarousel({
        items:1,
        loop:true,
        margin:30,
        nav:false,
        dots:true,
        autoplay:true,
        
    });
    $(" .wrapper-4 .slider").owlCarousel({
        items:1,
        loop:true,
        margin:30,
        nav:false,
        dots:true,
        autoplay:true,
        animateOut: 'fadeOut'
        
    });

     $(" .wrapper-19 .slider").owlCarousel({
        items:1,
        loop:true,
        nav:false,
        dots:true,
        margin:30
    });

    $(" .wrapper-6 .slider").owlCarousel({
        items:3,
        loop:true,
        margin:25,
        nav:true,
        dots:false,
        responsive : {
  
            0 : {
                items:1,
                center: true,
                dots:true,
            },
            768 : {
                items:1.5,
                dots:true, 
                nav:false
            },
            
            900 : {
                items:2,
                
            },
           
            1200 : {
                items:2.5,
                
            },
              1400 : {
                items:3,
                
            }
        }
    });

        $(" .wrapper-9 .slider").owlCarousel({
        items:3,
        loop:true,
        margin:25,
        nav:true,
        dots:false,
        responsive : {
  
            0 : {
                items:1,
                center: true,
                dots:true,
                nav:false,
            },
            768 : {
                items:2,
                dots:true, 
            },
            
            900 : {
                items:2,
            },
           
            1200 : {
                items:3,
                nav:true,
                dots:false,
                
            },
          
        }
    });


     $(".storiec-slider .slider").owlCarousel({
        items:1,
        loop:true,
        margin:25,
        nav:false,
        dots:true,
      
    });

    $(".header-section-mobile .mobile-header .header-right .bars").click(function(){
        $(".header-section-mobile .mobile-header .header-right .bars").toggleClass("active");
        $(".header-section-mobile").toggleClass("active");
        $(".overlay").toggleClass("active");

      });

      
    $(".overlay").click(function(){
        $(".header-section-mobile .mobile-header .header-right .bars").toggleClass("active");
        $(".header-section-mobile").toggleClass("active");
        $(".overlay").toggleClass("active");

      });


    gsap.to('.hero-section .bg img',{
        scale:1.1,
        duration:20,
        repeat:-1,
        yoyo:true,
    
    })


    gsap.from('.hero-content h1',{
        
        duration:1,
        delay:.5,
        opacity:0,
    })
    gsap.from('.hero-content img',{
        x:-300,
        duration:1,
        delay:.6,
        opacity:0,
    })
    gsap.from('.hero-content h3',{
        x:300,
        duration:1,
        delay:.7,
        opacity:0,
    })

    gsap.from('.hero-content p',{
        x:-300,
        duration:1,
        delay:.8,
        opacity:0,
    })
    gsap.from('.hero-section .image',{
        y:-300,
        duration:1,
        opacity:0,
        scrollTrigger:{
            trigger:'.hero-section .image',
            scroller:'body',
            start:'top 30%',
            end:'top 0%',
            // markers:true,
            scrub:2,
        }
    })

    gsap.from('.wrapper-1 .image',{
        x:300,
        duration:1,
        opacity:0,
        scrollTrigger:{
            trigger:'.wrapper-1 .image',
            scroller:'body',
            start:'top 100%',
            end:'top 90%',  
            //  markers:true,
            scrub:2,
        }
    })
    // gsap.from('.wrapper-1 .content',{
    //     y:-300,
    //     duration:1,
    //     opacity:0,
    //     scrollTrigger:{
    //         trigger:'.wrapper-1 .content',
    //         scroller:'body',
    //         start:'top 50%',
    //         end:'top 30%',
    //         // markers:true,
    //         scrub:2,
    //     }
    // })


    $(".project-item li").on("click", function() {

        var selector = $(this).attr("data-filter");
        $(".project-list").isotope({
            filter: selector
        });
    });




 
    $('.project-list').isotope()
    



  });


//   jQuery(window).load(function() {

//     jQuery(".project-list").isotope();

//   });

    //  let valueDisplays = document.querySelectorAll('.num');
    // let interval = 1000;

    // valueDisplays.forEach((valueDisplays) => {
    //     let startValue = 0;
    //     let endValue = parseInt(valueDisplays.getAttribute('data-val'));
    //     let duration = Math.floor(interval / endValue);
    //     let counter = setInterval(function () {
    //         startValue += 1;
    //         valueDisplays.textContent = startValue;
    //         if (startValue == endValue) {
    //             clearInterval(counter);
    //         }
    //     }, duration);

    // });





function animateCounter(el, target, step, suffix = "", plus = false) {
  let current = 0;
  const timer = setInterval(() => {
    current += step;
    if (current >= target) {
      current = target; // stop at target
      clearInterval(timer);
    }
    let display = current.toLocaleString() + suffix;
    if (plus && !suffix.includes("%")) {
      display += "+";
    }
    el.textContent = display;
  }, 30); // speed of increment
}

function isInView(el) {
  const rect = el.getBoundingClientRect();
  return rect.top < window.innerHeight && rect.bottom > 0;
}

const stats = document.querySelectorAll(".stat");
let started = false;

function checkScroll() {
  if (!started && isInView(stats[0])) {
    started = true;
    stats.forEach(stat => {
      const target = parseInt(stat.dataset.count, 10);
      const step = parseInt(stat.dataset.step, 10) || 1;
      const suffix = stat.dataset.suffix || "";
      const plus = stat.dataset.plus === "true";
      const numberEl = stat.querySelector(".number");
      animateCounter(numberEl, target, step, suffix, plus);
    });
  }
}

window.addEventListener("scroll", checkScroll);
window.addEventListener("load", checkScroll);



const body = document.body;
let lastScroll = 0;

window.addEventListener('scroll', () => {
  const currentScroll= window.pageYOffset

  if (currentScroll <= 0) {
    body.classList.remove('scroll-up')
  }

  if (currentScroll > lastScroll && !body.classList.contains('scroll-down')) {
    body.classList.remove('scroll-up')
    body.classList.add('scroll-down')
  }

    if (currentScroll < lastScroll && body.classList.contains('scroll-down')) {
    body.classList.remove('scroll-down')
    body.classList.add('scroll-up')
  }


  lastScroll = currentScroll;
});