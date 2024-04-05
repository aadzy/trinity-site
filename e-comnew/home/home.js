/*Sidebar*/
function toggleSidebar(ref){
  document.getElementById("sidebar").classList.toggle('active');
}


/*Counter */

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



/* const createOdometer = (el, value) => {
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
document.addEventListener("DOMContentLoaded", function() {
  fetch('home.php')
    .then(response => response.json()) // Get response as JSON
    .then(data => {
      const totalWeight = data.totalWeight; // Access the variable
      const subscribersOdometer = document.querySelector(".counter");
      createOdometer(subscribersOdometer, totalWeight);
    })
  .catch(error => console.error(error)); // Handle errors

  const url = new URL('home.php', window.location.href);
  console.log("URL:", window.location.href);
  const urlParams = new URLSearchParams(url.search);
  const totalWeightParam = urlParams.get('totalWeight');

  console.log("totalWeightParam:", totalWeightParam); // Debugging output

  if (totalWeightParam !== null && typeof totalWeightParam !== 'undefined') {
    const totalWeight = parseFloat(totalWeightParam); // Parse the parameter as a float
    const subscribersOdometer = document.querySelector(".counter");
    createOdometer(subscribersOdometer, 3600);
  }
}); */

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

