const tabLinks = document.querySelectorAll(".tabs__link");
function openTab(e, t) {
    document.querySelectorAll(".services__cards").forEach(e => { e.classList.remove("services__cards--active") }),
        tabLinks.forEach(e => { e.classList.remove("tabs__link--active") }),
        document.getElementById(t).classList.add("services__cards--active"),
        e.target.classList.add("tabs__link--active")
}

tabLinks.forEach(e => {
    e.addEventListener("click", (function (e) { openTab(e, e.target.dataset.tab) }))
}),
    document.querySelector(".dropdown-btn").addEventListener("click", (function () {
        document.querySelector(".tabs__inner").classList.toggle("tabs__inner--active")
    })),
    window.addEventListener("click", (function (e) {
        e.target.matches(".dropdown-btn") || document.querySelector(".tabs__inner").classList.remove("tabs__inner--active")
    }));



const tabs = document.querySelectorAll("[data-target]"),
    tabContents = document.querySelectorAll("[data-content]");

tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
        const target = document.querySelector(tab.dataset.target);

        tabContents.forEach((tabContent) => {
            tabContent.classList.remove("active_tab");
        });
        target.classList.add("active_tab");
        tabs.forEach((tab) => {
            tab.classList.remove("active_tab");
        });
        tab.classList.add("active_tab");
    });
}); 