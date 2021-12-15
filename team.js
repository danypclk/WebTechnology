function profileDetails(){
    document.getElementById("profileDetails").className = "showProfile";
    hideSection();
}

// hide and show Teamsection

function hideSection(){
    document.getElementById("teamSection").className = "hideSection";
}

function showSection(){
    document.getElementById("teamSection").className = "showSection";
}

// hide and show profile details

function showProfileDetails(number){
    document.getElementById("profileDetails").className = "showProfile";

    //-----------------------------------------------
    // hardcoded data
    
    let names = ["Torsten" , "Andrea", "Hugo"];
    let status = ["CEO", "CFO", "Mitarbeiter"];
    let alter = ["45", "35", "55"];
    let groesse = ["1.80", "1.67", "1.89"];
    let wohnort = ["Köln", "Köln", "Köln"];
    let arbeitszeit = ["25.07.2015", "25.07.2015", "25.07.2015"];

    //-------------------------------------------------
    document.getElementById("Name").innerHTML = names[number];
    document.getElementById("Status").innerHTML = status[number];
    document.getElementById("Alter").innerHTML = alter[number];
    document.getElementById("Groesse").innerHTML = groesse[number];
    document.getElementById("Wohnort").innerHTML = wohnort[number];
    document.getElementById("Arbeitszeit").innerHTML = arbeitszeit[number];
}

function hideProfileDetails(){
    document.getElementById("profileDetails").className = "hideProfile";
}

function profileDetails(position){
    showProfileDetails(position);
    hideSection();
}

function profileDetailsBack(){
    hideProfileDetails();
    showSection();
}