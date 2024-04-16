
  (function ($) {
  
  "use strict";

    
    $('.navbar-collapse a').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });
    
    
    $('.smoothscroll').click(function(){
      var el = $(this).attr('href');
      var elWrapped = $(el);
      var header_height = $('.navbar').height();
  
      scrollToDiv(elWrapped,header_height);
      return false;
  
      function scrollToDiv(element,navheight){
        var offset = element.offset();
        var offsetTop = offset.top;
        var totalScroll = offsetTop-navheight;
  
        $('body,html').animate({
        scrollTop: totalScroll
        }, 300);
      }
    });
  
  })(window.jQuery);



function redirectToLoginPage() {
      
      window.location.href = 'login.html';
  }



  function shareOnFacebook() {
    var currentURL = window.location.href;
    var facebookShareURL = 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(currentURL);
    window.open(facebookShareURL, '_blank');
}

function shareOnTwitter() 
{
    var currentURL = window.location.href;
    var twitterShareURL = 'https://twitter.com/intent/tweet?url=' + encodeURIComponent(currentURL);
    window.open(twitterShareURL, '_blank');
    }


function reloadInstagram() 
    {
        var instagramURL = "https://www.instagram.com";
        var newWindow = window.open(instagramURL, '_blank');
        if (newWindow) {
            newWindow.addEventListener('load', function() {
                newWindow.location.reload();
            });
        }
        }


      

  let currentIndex = 0;
  const images = document.querySelectorAll('.gallery img');
  const totalImages = images.length;

  
  function openLightbox(event) {
      if (event.target.tagName === 'IMG') {
          const clickedIndex = Array.from(images).indexOf(event.target);
          currentIndex = clickedIndex;
          updateLightboxImage();
          document.getElementById('lightbox').style.display = 'flex';
      }
  }

  
  function closeLightbox() {
      document.getElementById('lightbox').style.display = 'none';
  }

  
  function changeImage(direction) {
      currentIndex += direction;
      if (currentIndex >= totalImages) {
          currentIndex = 0;
      } else if (currentIndex < 0) {
          currentIndex = totalImages - 1;
      }
      updateLightboxImage();
  }

  
  function updateLightboxImage() {
      const lightboxImg = document.getElementById('lightbox-img');
      const thumbnailContainer = document.getElementById('thumbnail-container');

      
      lightboxImg.src = images[currentIndex].src;

      
      thumbnailContainer.innerHTML = '';

      
      images.forEach((image, index) => {
          const thumbnail = document.createElement('img');
          thumbnail.src = image.src;
          thumbnail.alt = `Thumbnail ${index + 1}`;
          thumbnail.classList.add('thumbnail');
          thumbnail.addEventListener('click', () => updateMainImage(index));
          thumbnailContainer.appendChild(thumbnail);
      });


      const thumbnails = document.querySelectorAll('.thumbnail');
      thumbnails[currentIndex].classList.add('active-thumbnail');
  }

  
  function updateMainImage(index) {
      currentIndex = index;
      updateLightboxImage();
  }


  updateLightboxImage();


  document.addEventListener('keydown', function (e) {
      if (document.getElementById('lightbox').style.display === 'flex') {
          if (e.key === 'ArrowLeft') {
              changeImage(-1);
          } else if (e.key === 'ArrowRight') {
              changeImage(1);
          }
      }
  });





  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('loginUsername').value;
    const password = document.getElementById('loginPassword').value;
  
    
    if (username === 'admin' && password === 'password') {
    
      alert('Login Successful');
    } else {
      
      alert('Invalid username or password');
    }
  });
  
  document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('regUsername').value;
    const email = document.getElementById('regEmail').value;
    const password = document.getElementById('regPassword').value;
    const confirmPassword = document.getElementById('regConfirmPassword').value;
  
    
    if (username && email && password && confirmPassword) {
      
      if (password === confirmPassword) {
        
        alert('Registration Successful');
        
        document.getElementById('registrationForm').reset();
      } else {
        
        alert('Passwords do not match');
      }
    } else {
     
      alert('Please fill in all fields');
    }
  });

  const msalConfig = {
    auth: {
        clientId: 'YOUR_MICROSOFT_APP_CLIENT_ID',
        authority: 'https://login.microsoftonline.com/YOUR_TENANT_ID',
        redirectUri: 'YOUR_REDIRECT_URI',
    },
    cache: {
        cacheLocation: 'localStorage',
        storeAuthStateInCookie: true,
    }
};


const msalInstance = new msal.PublicClientApplication(msalConfig);

document.querySelector('.microsoft').addEventListener('click', async (event) => {
    event.preventDefault();

    const loginRequest = {
        scopes: ['openid', 'profile', 'User.Read'],
    };

    try {
        const response = await msalInstance.loginPopup(loginRequest);
        
        console.log('User logged in', response);
    } catch (error) {
        
        console.error('Error during login', error);
    }
});






document.addEventListener('DOMContentLoaded', function () {
  
  var tabs = new bootstrap.Tab(document.getElementById('nav-ContactForm-tab'));
  tabs.show();

  
  var contactForm = document.getElementById('contactForm');
  var sendMessageBtn = document.getElementById('sendMessageBtn');
  contactForm.addEventListener('submit', function (event) {
      event.preventDefault();
      
      displaySuccessMessage();
  });

  
  function displaySuccessMessage() {
      alert('Message sent successfully!');
  }
});













