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
    
    let names = ["Andreas Schmitt" , "Noah Simonis", "Stefanie Müller",
                 "Paul Siegemund", "Torsten Schneider", "Julia Weber",
                 "Marius Berens", "Leon Kloep", "Daniela Fischer"
    ];
    let status = ["Geschäftsführung (CEO)", "Betriebsleiter (CFO)", "Kaufmännische Leitung (CFO)",
                  "Personalleitung (CHRO)", "Marketing-Chef (CMO)", "Assistentin CEO / CFO",
                  "Projektleitung", "Systemadministrator", "Auszubildene"
    ];
    let alter = ["54", "50", "34",
                 "36", "40", "28",
                 "31", "29", "17"
    ];
    let groesse = ["1.85", "1.79", "1.67",
                   "1.82", "1.75", "1.64",
                   "1.94", "1.88", "1.69"
    ];
    let wohnort = ["Trier", "Kasel", "Waldrach",
                   "Trier", "Trierweiler", "Trier",
                   "Morscheid", "Trier", "Tarforst"
    ];
    let arbeitszeit = ["21.09.2015", "15.11.2015", "22.04.2016",
                       "23.05.2017", "08.01.2016", "28.01.2016",
                       "22.08.2017", "09.09.2019", "01.09.2021"
    ];

    let image = [ "images/cartoon-gc2871d41c_1920.jpg", "images/Noah_Simonis_Team_Farbe.jpg", "images/cartoon-gc2871d41c_1920.jpg",
                  "images/Paul_Siegemund_Team_Farbe.jpg", "images/cartoon-gc2871d41c_1920.jpg", "images/cartoon-gc2871d41c_1920.jpg",
                  "images/Marius_Berens_Team_Farbe.jpg", "images/Leon_Kloep_Team_Farbe.jpg", "images/cartoon-gc2871d41c_1920.jpg",
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