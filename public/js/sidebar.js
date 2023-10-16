const sidebarMenuItem = [...document.querySelectorAll(".sidebar_menu_item")];

sidebarMenuItem.map((item) => {
    item.addEventListener("click", () => {
		if (item.nextElementSibling.classList.contains('sidebar_submenu_list')) {
			item.nextElementSibling.classList.toggle("d-none");
			item.querySelector(".sidebar_submenu_icon").classList.toggle(
				"sidebar_submenu_icon_down"
			);	
		}
    });
});
