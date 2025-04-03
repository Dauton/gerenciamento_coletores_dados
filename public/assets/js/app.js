setTimeout(() => {
    let p = document.getElementById("alert-result");
    p.style.opacity = "0";
    
    setTimeout(() => {
        p.style.display = "none";
    }, 3000);
}, 5000);