document.addEventListener("DOMContentLoaded", function(event) {
  const player = document.getElementById("player");
  const personaje = document.getElementById('personaje');
  
  let xPosition = 0;
  let yPosition = 0;
  function moveCube(event) {
    switch(event.keyCode) {
      case 65: 
        xPosition -= 10;
        break;
      case 68: 
        xPosition += 10;
        break;
    }
    player.style.transform = `translate3d(${xPosition}px, ${yPosition}px, 0)`;
    window.scrollTo(xPosition, yPosition);
  }
  document.addEventListener("keydown", moveCube);

  var currentAnimation = null;

  function animate(event){
    
    if(event.keyCode === 68 && currentAnimation !== 'movement'){
      personaje.classList.remove(currentAnimation);
      personaje.classList.add('movement');
      currentAnimation = 'movement';
    }else if(event.keyCode === 65 && currentAnimation !== 'left'){
      personaje.classList.remove(currentAnimation);
      personaje.classList.add('left');
      currentAnimation = 'left'
    }

  }

  function repeat(event){
    if(event.keyCode === 68 && currentAnimation === 'movement'){
      personaje.classList.remove('movement');
      currentAnimation = null;
    }else if(event.keyCode === 65 && currentAnimation === 'left'){
      personaje.classList.remove('left');
      currentAnimation = null;
    }
  }

  document.addEventListener('keydown' , animate);
  document.addEventListener('keyup', repeat);


});


