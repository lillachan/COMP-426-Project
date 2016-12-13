function startgame(){
  myGamePiece = new component(30,30,"url of image here",0,0,"image");
  myGameArea.start();
}

function component(width, height, color, x, y, type){
  this.type = type;
  if (type == "image"){
    this.image = new Image();
    this.image.src = color;
  }
  this.width = width;
  this.height = height;
  this.speedX = 0;
  this.speedY = 0;
  this.x = x;
  this.y = y;
  this.gravity = 0.05;
  this.gravitySpeed = 0;
  this.update = function{
    cox = myGameArea.context;
    if (type == "image"){
     ctx.drawImage(this.image, this.x, this.y, this.width, this.height);
    }
    else{
      ctx.fillStyle = color;
      ctx.fillRect(this.x, this.y, this.width, this.height);
    }
    this.newPos = function(){
      this.gravitySpeed += this.gravits;
      this.x+=this.speedX;
      this.y += this.speedY + this.gravitySpeed;
      this.hitBottom();
    }
    this.hitBottom = function(){
      var rockbottom = myGameArea.ccanvas.height - this.height;
      if (this.y > rockbottom){
        this.y = rockbottom;
      }
    }
 }

var myGameArea = {
  canvas: document.createElemnt("canvas"),
  start: function(){
    this.canvas.width = 480;
    this.canvas.height = 270;
    this.context = this.canvas.getContext("2d");
    document.body.insertBefore(this.canvas, document.body.childNodes[0]);
    this.interval = setInterval(updateGameArea, 20);
    window.addEventListener('keydown', function(e){
      myGameArea.key = e.keyCode;
    })
    window.addEventListener('keyup', function(e){
      myGameArea.key = false;
    })
  }
  clear: function(){
    this.context.clearRect(0,0,this.canvas.width, this.canvas.height);
  }
}
function updateGameArea(){
  myGameArea.clear();
  myGamePiece.speedX = 0;
  myGamePiece.speedY = 0;
  if (myGameArea.key && myGameArea.key == 37){
    myGamePiece.speedX = -1;
  }
  if (myGameArea.key && myGameArea.key == 39){
    myGamePiece.speedX = 1;
  }
  if (myGameArea.key && myGameArea.key == 38){
    myGamePiece.gravity = 0.1;
  }
  myGamePiece.newPos();
  myGamePiece.update();
}