//  Right Click Disabled 
  var msg = "Right click disabled"; //change this message to a message of your own if you want
  var showMsg = 0; //change this to 0 if you do not want to show any popup messages when the user right clicks

  function internetExplorerRightClick(){ //code to handle right clicks in Internet Explorer
    if (document.all){
    if (showMsg == 0){
    alert(msg);
  }
    return false;
    }
  }

    function firefoxRightClick(e){ //code to handle right clicks in Firefox and Chrome (as well as other obsolete browsers such as Netscape)
    if ((document.layers) || (document.getElementById && !document.all)) {
    if (e.which==2 || e.which==3){
    if (showMsg == 1){
    alert(msg);
  }
    
      }
    }
  }

  if (document.layers){
  document.captureEvents(Event.MOUSEDOWN);
  document.onmousedown=firefoxRightClick;
  }
  else{
  document.onmouseup=firefoxRightClick;
  document.oncontextmenu=internetExplorerRightClick;
  }

  document.oncontextmenu=new Function("return false");