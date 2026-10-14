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

(() => {
	const elements = document.querySelectorAll("[data-reveal]");

	if (!elements.length) {
		return;
	}

	if (
		!("IntersectionObserver" in window) ||
		window.matchMedia("(prefers-reduced-motion: reduce)").matches
	) {
		elements.forEach((element) => element.classList.add("is-visible"));
		return;
	}

	const observer = new IntersectionObserver(
		(entries) => {
			entries.forEach((entry) => {
				if (!entry.isIntersecting) {
					return;
				}

				entry.target.classList.add("is-visible");
				observer.unobserve(entry.target);
			});
		},
		{
			rootMargin: "0px 0px -8% 0px",
			threshold: 0.12,
		},
	);

	elements.forEach((element) => observer.observe(element));
})();
