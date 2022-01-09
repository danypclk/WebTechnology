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
    
    let names = ["Lukas Neuerburg" , "Noah Simonis", "Marius Graus",
                 "Paul Siegemund", "Torsten Schneider", "Lotte Görgen",
                 "Marius Berens", "Leon Kloep", "Janine Ritz"
    ];
    let status = ["Geschäftsführung (CEO)", "Betriebsleiter (CFO)", "Kaufmännische Leitung (CFO)",
                  "Personalleitung (CHRO)", "Marketing-Chef (CMO)", "Assistentin CEO / CFO",
                  "Projektleitung", "Systemadministrator", "Auszubildene"
    ];
    let alter = ["23", "21", "19",
                 "29", "40", "25",
                 "27", "34", "18"
    ];
    let groesse = ["1.85", "1.79", "1.97",
                   "1.88", "1.75", "1.64",
                   "1.94", "1.85", "1.69"
    ];
    let wohnort = ["Fliessen", "Dreis", "Oberemmel",
                   "Klausen", "Trierweiler", "Trier",
                   "Dorf", "Lüxem", "Tarforst"
    ];
    let arbeitszeit = ["17.07.2014", "17.07.2014", "22.04.2016",
                       "25.09.2015", "08.01.2016", "28.01.2016",
                       "22.08.2017", "09.09.2019", "01.09.2021"
    ];

    let image = [ "images/Lukas_Neuerburg_Team_Farbe.png", "images/Noah_Simonis_Team_Farbe.jpg", "images/Marius_Graus_Team_Farbe.jpg",
                  "images/Paul_Siegemund_Team_Farbe.jpg", "images/cartoon-gc2871d41c_1920.jpg", "images/Lotte_Görgen_Team_Frabe.JPG",
                  "images/Marius_Berens_Team_Farbe.jpg", "images/Leon_Kloep_Team_Farbe.jpg", "images/Janine_Ritz_Team_Frabe.JPG",
    ];

    //-------------------------------------------------
    document.getElementById("Name").innerHTML = names[number];
    document.getElementById("Status").innerHTML = status[number];
    document.getElementById("Alter").innerHTML = alter[number];
    document.getElementById("Groesse").innerHTML = groesse[number];
    document.getElementById("Wohnort").innerHTML = wohnort[number];
    document.getElementById("Arbeitszeit").innerHTML = arbeitszeit[number];
    document.getElementById("profileImg").src = image[number];
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