import './bootstrap';

import Alpine from 'alpinejs';
import collapse from '@alpinejs/collapse'
import {get, post} from "./http.js";
import 'flowbite';
import Splide from '@splidejs/splide';

Alpine.plugin(collapse)

window.Alpine = Alpine;

document.addEventListener("alpine:init", async () => {

  Alpine.data("toast", () => ({
    visible: false,
    delay: 5000,
    percent: 0,
    interval: null,
    timeout: null,
    message: null,
    close() {
      this.visible = false;
      clearInterval(this.interval);
    },
    show(message) {
      this.visible = true;
      this.message = message;

      if (this.interval) {
        clearInterval(this.interval);
        this.interval = null;
      }
      if (this.timeout) {
        clearTimeout(this.timeout);
        this.timeout = null;
      }

      this.timeout = setTimeout(() => {
        this.visible = false;
        this.timeout = null;
      }, this.delay);
      const startDate = Date.now();
      const futureDate = Date.now() + this.delay;
      this.interval = setInterval(() => {
        const date = Date.now();
        this.percent = ((date - startDate) * 100) / (futureDate - startDate);
        if (this.percent >= 100) {
          clearInterval(this.interval);
          this.interval = null;
        }
      }, 30);
    },
  }));

  Alpine.data("productItem", (product) => {
    return {
      product,
      addToCart(quantity = 1) {
        post(this.product.addToCartUrl, {quantity})
          .then(result => {
            this.$dispatch('cart-change', {count: result.count})
            this.$dispatch("notify", {
              message: "The item was added into the cart",
            });
          })
          .catch(response => {
            console.log(response);
          })
      },
      removeItemFromCart() {
        post(this.product.removeUrl)
          .then(result => {
            this.$dispatch("notify", {
              message: "The item was removed from cart",
            });
            this.$dispatch('cart-change', {count: result.count})
            this.cartItems = this.cartItems.filter(p => p.id !== product.id)
          })
      },
      changeQuantity() {
        post(this.product.updateQuantityUrl, {quantity: product.quantity})
          .then(result => {
            this.$dispatch('cart-change', {count: result.count})
            this.$dispatch("notify", {
              message: "The item quantity was updated",
            });
          })
      },
    };
  });
});


Alpine.start();

new Splide( '#image-carousel', {
  type   : 'loop',
  perPage: 4,
  perMove: 1,
  gap    : '0.5rem',
  autoplay: false,
  pagination: true,
  omitEnd  : true,
  autoWidth: false,
  breakpoints: {
    1280: {
      perPage:4,
      gap: '1rem',
    },
    800: {
      perPage: 3,
      gap    : '.7rem',
    },
    640: {
      perPage: 2,
      gap    : '.7rem',
    },
    480: {
      perPage: 1,
      gap    : '.5rem',
    },
  },
}).mount();

document.addEventListener('DOMContentLoaded', function () {
  // Tu código de inicialización de Splide aquí
  const splideImages = new Splide( '#hero_banner', {
    arrows: false,
    type   : 'fade',
    rewind: true,
    perPage: 1,
    perMove: 1,
    autoplay: false,
    pagination: true,
    focus:'center',
    omitEnd  : false,
    interval: 5000,
    speed: 1000,
    width: '100%',
    breakpoints: {
      // 800: {
      // },
      640: {
        height:'auto',
      },
      // 480: {
      //   perPage: 1,
      // },
    },
  }).mount();
  
  splideImages.on('move', function () {
    var currentImage = splideImages.index;
    var images = document.querySelectorAll(".splide__slide .image_slide");

    images.forEach(function(image, index) {
        if (index === currentImage) {
            image.classList.add("rotating");
        } else {
            image.classList.remove("rotating");
        }
    });
  });

  var paginationItems = document.querySelectorAll('.splide__pagination__page');
  var h1Elements = document.querySelectorAll('.splide__slide h1');

  paginationItems.forEach(function(item, index) {
      if (index < h1Elements.length) {
          var contenidoHTML = h1Elements[index].innerHTML;
          var spanElement = document.createElement('span');
          spanElement.innerHTML = contenidoHTML;
          item.parentNode.insertBefore(spanElement, item);
      }
  });
});