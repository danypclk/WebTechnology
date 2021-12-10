"use strict";

let stromkosten = document.querySelector("#stromkosten");
let betriebszeit = document.querySelector("#betriebszeit");
let watt = document.querySelector("#watt");




function stromkosten(strompreis, betriebszeit, watt){
    
    stromkosten = strompreis / 100  * betriebszeit * watt /1000;

    return stromkosten;
}

