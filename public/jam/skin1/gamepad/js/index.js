var gamepad = {
  connected: false,
  timestamp: null,
  buttons: [],
  axes: []
}

var buttonMap = [
  'A','B',null,'X','Y',null,'BL','BR',null,null,'SELECT','START'
];

var axesMap = [
  'U','D','L','R'
];


var pollGamePad = function(){

  var p1 = navigator.getGamepads()[0];

  if(!p1 || (!p1.connected && gamepad.connected)){
    onDisconnect();
    return window.requestAnimationFrame(pollGamePad);
  }

  if(p1.connected && !gamepad.connected)
    onConnect();

  if(!p1 || !p1.timestamp || p1.timestamp===gamepad.timestamp)
    return window.requestAnimationFrame(pollGamePad);

  //check buttons
  var buttons = _.map(p1.buttons, function(b){ return b.pressed });
  _.each(buttons, function(value, index){
    var isChange = (value!==gamepad.buttons[index]);
    if(isChange){
      if(value)
        onButtonDown(index);

      else
        onButtonUp(index);
    }
  })



  //check axes
  var axes = _.map(p1.axes, function(b){ return b });
  _.each(axes, function(value, index){
    var isChange = (value!==gamepad.axes[index]);
    if(isChange){
      //trim residual decimals only {-1,0,1}
      value = parseInt(value);
      if(!index){

        if(value<0){
          onAxesDown(2);
          onAxesUp(3);
        }
        else if(value>0){
          onAxesDown(3)
          onAxesUp(2)
        }
        else{
          onAxesUp(2);
          onAxesUp(3);
        }

      }
      else{

        if(value<0){
          onAxesDown(0);
          onAxesUp(1);
        }
        else if(value>0){
          onAxesDown(1);
          onAxesUp(0);
        }
        else{
          onAxesUp(0);
          onAxesUp(1);
        }


      }
      /*if(value)
        onButtonDown(index);
      else
        onButtonUp(index);
        */
      //onAxesChange(index);
    }
  })

  //update gamepad object
  gamepad.timestamp = p1.timestamp;
  gamepad.buttons = buttons;
  gamepad.axes = axes;

  //chain next update
  window.requestAnimationFrame(pollGamePad);

}


// var onButtonDown = function(index){
//   $('.button-'+buttonMap[index]).addClass('active');
//   console.log(index);
//   if(index === 7){
//       timeline.reverse();
//   }
// }

var onButtonUp = function(index){
  $('.button-'+buttonMap[index]).removeClass('active');
}

var onAxesDown = function(index){
  $('.axes-'+axesMap[index]).addClass('active');
}

var onAxesUp = function(index){
  $('.axes-'+axesMap[index]).removeClass('active');
}

var onAxesChange = function(index){

  if(index){

  }
  //console.log('axis down '+index);
  console.log(index+' -> '+navigator.getGamepads()[0].axes[index]);
}

var onConnect = function(index){
  $('.status').text('CONNECTED!');
}

var onDisconnect = function(index){
  $('.status').text('NOT CONNECTED');
}

pollGamePad();
