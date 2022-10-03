function updateTextareaHeight(input) {
    input.style.height = 'auto';
    input.style.height = input.scrollHeight+'px';
}

var login = document.querySelector('.signin-btn'),
logout = document.querySelector('.signout-btn');
login.addEventListener('click', function(e){
  this.classList.add('is-hidden');//adds is-hidden class
  logout.classList.remove('is-hidden');//removes is-hidden class
});
logout.addEventListener('click', function(e){
  this.classList.add('is-hidden');
  login.classList.remove('is-hidden');
});