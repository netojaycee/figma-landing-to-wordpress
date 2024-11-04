// Select elements
const hamburger = document.getElementById("hamburger");
const sidebar = document.getElementById("sidebar");
const closeSidebar = document.getElementById("closeSidebar");

// Open sidebar when clicking on the hamburger icon
hamburger.addEventListener("click", () => {
  sidebar.classList.remove("translate-x-full");
});

// Close sidebar when clicking on the "X" icon
closeSidebar.addEventListener("click", () => {
  sidebar.classList.add("translate-x-full");
});

// $(document).ready(function () {
//   $(".carousel").slick({
//     dots: true,
//     infinite: true,
//     speed: 500,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//     autoplay: true,
//     autoplaySpeed: 3000,
//     arrows: true,
//     prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
//     nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
//   });
// });

document.addEventListener("DOMContentLoaded", () => {
  // Select all images and probability cards
  const images = document.querySelectorAll(".candidate-img");
  const cards = document.querySelectorAll(".probability-card");

  // Show the first card by default
  cards.forEach((card, index) => {
    card.style.display = index === 0 ? "block" : "none";
  });

  // Function to show the corresponding card
  const showCard = (id) => {
    // Hide all cards
    cards.forEach((card) => {
      card.style.display = "none";
    });

    // Show the card corresponding to the clicked image
    document.getElementById(`card-${id}`).style.display = "block";
  };

  // Add click event listener to images using event delegation
  document.querySelector(".flex.gap-4").addEventListener("click", (event) => {
    if (event.target.classList.contains("candidate-img")) {
      const id = event.target.getAttribute("data-id");
      showCard(id);
    }
  });
});


(function($) {
  $(document).ready(function() {
    $(".carousel").slick({
      // your settings here
      dots: true,
      infinite: true,
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
      nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
  
    });
  });
})(jQuery);



// (function($) {
//   $(document).ready(function() {
//     $(".carousel-pres").slick({
//       // your settings here
//       dots: false,
//       infinite: true,
//       speed: 500,
//       slidesToShow: 6,
//       slidesToScroll: 1,
//       autoplay: false,
//       autoplaySpeed: 3000,
//       arrows: true,
//       prevArrow: '<button type="button" class="slick-prev">&#10094;</button>',
//       nextArrow: '<button type="button" class="slick-next">&#10095;</button>',
  
//       responsive: [
//         {
//           breakpoint: 1024,
//           settings: {
//             slidesToShow: 4,
//             slidesToScroll: 1,
//           },
//         },
//         {
//           breakpoint: 768,
//           settings: {
//             slidesToShow: 2,
//             slidesToScroll: 1,
//           },
//         },
//         {
//           breakpoint: 480,
//           settings: {
//             slidesToShow: 1,
//             slidesToScroll: 1,
//           },
//         },
//       ],
//     });
//   });
// })(jQuery);


