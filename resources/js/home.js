function navbar() {
    window.addEventListener("scroll", () => {
        if (window.scrollY == 0) {
            document.getElementById("navbarB").id = "navbarA";
        } else {
            document.getElementById("navbarA").id = "navbarB";
        }
    })};

    navbar();