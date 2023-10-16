const headerMobileMenu = document.querySelector(".header_mobile_menu");
const headerMobileMenuItem = [
    ...document.querySelectorAll(".header_mobile_menu_item"),
];
const hamburger = document.querySelector(".hamburger");
const headerMobileMenuClose = document.querySelector(
    ".header_mobile_menu_close"
);

headerMobileMenuItem.map((item) => {
    item.addEventListener("click", (e) => {
        e.stopImmediatePropagation();
        item.querySelector(".header_mobile_submenu")?.classList.toggle(
            "d-none"
        );
    });
});

hamburger.addEventListener("click", () => {
    headerMobileMenu.classList.toggle("header_mobile_menu_open");
});

headerMobileMenuClose.addEventListener("click", () => {
    headerMobileMenu.classList.toggle("header_mobile_menu_open");
});
