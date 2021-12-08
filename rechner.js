"use strict";


function stromkosten(strompreis, betriebszeit, watt){
    
    stromkosten = strompreis / 100  * betriebszeit * watt /1000;

    return stromkosten;
}

