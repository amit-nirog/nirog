var slideLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideLeftBtn = document.querySelector('#c-button--slide-left');
  
  slideLeftBtn.addEventListener('click', function(e) {
    e.preventDefault;
    slideLeft.open();
  });


  var pushLeft = new Menu({
    wrapper: '#o-wrapper',
    type: 'push-left',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var pushLeftBtn = document.querySelector('#c-button--push-left');
  
  pushLeftBtn.addEventListener('click', function(e) {
    e.preventDefault;
    pushLeft.open();
  });


  var slideRight = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-right',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideRightBtn = document.querySelector('#c-button--slide-right');
  
  slideRightBtn.addEventListener('click', function(e) {
    e.preventDefault;
    slideRight.open();
  });


  var pushRight = new Menu({
    wrapper: '#o-wrapper',
    type: 'push-right',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var pushRightBtn = document.querySelector('#c-button--push-right');
  
  pushRightBtn.addEventListener('click', function(e) {
    e.preventDefault;
    pushRight.open();
  });


  var slideTop = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-top',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideTopBtn = document.querySelector('#c-button--slide-top');
  
  slideTopBtn.addEventListener('click', function(e) {
    e.preventDefault;
    slideTop.open();
  });


  var pushTop = new Menu({
    wrapper: '#o-wrapper',
    type: 'push-top',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var pushTopBtn = document.querySelector('#c-button--push-top');
  
  pushTopBtn.addEventListener('click', function(e) {
    e.preventDefault;
    pushTop.open();
  });


  var slideBottom = new Menu({
    wrapper: '#o-wrapper',
    type: 'slide-bottom',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var slideBottomBtn = document.querySelector('#c-button--slide-bottom');
  
  slideBottomBtn.addEventListener('click', function(e) {
    e.preventDefault;
    slideBottom.open();
  });


  var pushBottom = new Menu({
    wrapper: '#o-wrapper',
    type: 'push-bottom',
    menuOpenerClass: '.c-button',
    maskId: '#c-mask'
  });

  var pushBottomBtn = document.querySelector('#c-button--push-bottom');
  
  pushBottomBtn.addEventListener('click', function(e) {
    e.preventDefault;
    pushBottom.open();
  });