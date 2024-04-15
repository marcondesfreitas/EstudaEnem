tell = document.getElementById('tell');

tell.addEventListener("keyup", function(e) {
    tell2 = tell.value;
    if(tell2.length === 1){
        tell.value = "(" + tell.value;
    }
    if(tell2.length === 3){
        tell.value = tell.value + ") ";
    }
    if(tell2.length === 10){
        tell.value = tell.value + "-";
    }

});