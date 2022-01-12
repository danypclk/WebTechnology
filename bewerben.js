function randomCode() {
    let code = Math.random() * 10000;
    while( code < 1000){
        code = Math.random() * 10000;
    }

    document.getElementById("Code").value = Math.round(code);

    
}
