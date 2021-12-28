"use strict";

/* button click - startet Berechnung */ 
function berechnen(){
    var preis = getStrompreis() / 100  * getBetriebszeit() * getWatt() /1000;
    setErgebnis(preis + " €");
}

/* Setzt den Wert von Ergebnis und gibt ihn aus*/
function setErgebnis(ergebnis){
    document.getElementById("ergebnis").innerHTML = ergebnis;
}

/* bekommt den Wert von Input Feld Strompreis */
function getStrompreis(){
    let strompreis = document.getElementById("strompreis").value;
    return strompreis;
}
/* bekommt den Wert von Input Feld Betriebszeit */
function getBetriebszeit(){
    let betriebszeit = document.getElementById("betriebszeit").value;
    return betriebszeit;
}
/* bekommt den Wert von Input Feld Watt */
function getWatt(){
    let watt = document.getElementById("watt").value;
    return watt;
}

/* Reset Funktion. Löscht werte aller Felder */

function reset(){
    document.getElementById('ergebnis').textContent = '';
	document.getElementById('watt').value = '';
	document.getElementById('betriebszeit').value = '';
	document.getElementById('strompreis').value = '';
}


