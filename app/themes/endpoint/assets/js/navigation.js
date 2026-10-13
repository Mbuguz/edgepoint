document.documentElement.classList.add("js");

(() => {
	const toggle = document.querySelector("[data-nav-toggle]");
	const navigation = document.querySelector("[data-nav]");

	if (!toggle || !navigation) {
		return;
	}

	const close = () => {
		toggle.setAttribute("aria-expanded", "false");
		navigation.classList.remove("is-open");
		document.body.classList.remove("nav-open");
	};

	const open = () => {
		toggle.setAttribute("aria-expanded", "true");
		navigation.classList.add("is-open");
		document.body.classList.add("nav-open");
	};

	toggle.addEventListener("click", () => {
		if (toggle.getAttribute("aria-expanded") === "true") {
			close();
		} else {
			open();
		}
	});

	document.addEventListener("keydown", (event) => {
		if (event.key === "Escape" && toggle.getAttribute("aria-expanded") === "true") {
			close();
			toggle.focus();
		}
	});

	navigation.addEventListener("click", (event) => {
		if (event.target.closest("a")) {
			close();
		}
	});

	window.addEventListener("resize", () => {
		if (window.matchMedia("(min-width: 68.01rem)").matches) {
			close();
		}
	});
})();
