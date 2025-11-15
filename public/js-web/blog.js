   document.addEventListener("DOMContentLoaded", () => {
       const observerOptions = { threshold: 0.2 };
       const fadeInElements = document.querySelectorAll('.animate-fadeInLeft, .animate-fadeInRight, .animate-fadeUp');


       const fadeInOnScroll = new IntersectionObserver((entries) => {
           entries.forEach(entry => {
               if (entry.isIntersecting) {
                   entry.target.classList.add('opacity-100', 'translate-x-0', 'translate-y-0');
               }
           });
       }, observerOptions);


       fadeInElements.forEach(el => {
           let base = 'opacity-0 transform transition-all duration-700 ease-out ';
           if (el.classList.contains('animate-fadeInLeft')) el.classList.add(...base.split(' '), '-translate-x-10');
           if (el.classList.contains('animate-fadeInRight')) el.classList.add(...base.split(' '), 'translate-x-10');
           if (el.classList.contains('animate-fadeUp')) el.classList.add(...base.split(' '), 'translate-y-10');
           fadeInOnScroll.observe(el);
       });
   });
