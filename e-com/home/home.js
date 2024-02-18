const createOdometer = (el, value) => {
    const odometer = new Odometer({
      el: el,
      value: 0,
    });
  
    let hasRun = false;
  
    const options = {
      threshold: [0, 0.9],
    };
  
    const callback = (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          if (!hasRun) {
            odometer.update(value);
            hasRun = true;
          }
        }
      });
    };
  
    const observer = new IntersectionObserver(callback, options);
    observer.observe(el);
  };
  
  const subscribersOdometer = document.querySelector(".counter");
  createOdometer(subscribersOdometer, 60000);


  /*Button code*/
  document.addEventListener("DOMContentLoaded", function() {
    window.scrollTo({
        top: 0,
        behavior: 'auto' // You can use 'auto' or 'smooth' for smooth scrolling
    });
    const backToTopBtn = document.getElementById('back-to-top-btn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 1000) {
            backToTopBtn.style.opacity = 1;
        } else {
            backToTopBtn.style.opacity = 0;
        }
    });

    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

