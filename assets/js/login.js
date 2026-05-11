// detectar error en URL
if (window.location.search.includes("error")) {

    document.querySelectorAll("input").forEach(input => {
        input.classList.add("error");
    });

}
document.querySelectorAll(".wrapper input").forEach(input => {