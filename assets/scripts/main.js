let lenis = null;

if (window.Lenis) {
  lenis = new Lenis();
  window.lenis = lenis;

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }

  requestAnimationFrame(raf);
}

if (window.Headroom) {
  const headroomEl = document.querySelector("#headroom");
  if (headroomEl) {
    const navHeadroom = new Headroom(headroomEl, {
      tolerance: 5,
      offset: 200,
      classes: {
        initial: "headroom",
        pinned: "headroom-pinned",
        unpinned: "headroom-unpinned",
      },
    });
    navHeadroom.init();

    setTimeout(() => {
      headroomEl.classList.remove("hidden");
    }, 100);
  }

  const backToTopBtn = document.querySelector("#BackToTop");
  if (backToTopBtn) {
    const backToTopHeadroom = new Headroom(backToTopBtn, {
      tolerance: 5,
      offset: 1000,
      classes: {
        initial: "back-to-top",
        pinned: "back-to-top-pinned",
        unpinned: "back-to-top-unpinned",
        top: "back-to-top-top",
      },
    });
    backToTopHeadroom.init();
  }
}

const time = document.querySelector("#time");
if (time) {
  time.textContent = getCurrentTime();
}

function getCurrentTime(date = new Date()) {
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? "pm" : "am";
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? "0" + minutes : minutes;

  return hours + ":" + minutes + " " + ampm;
}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll("img").forEach(function (img, index) {
    if (!img.hasAttribute("decoding")) img.setAttribute("decoding", "async");
    if (index > 1 && !img.hasAttribute("loading")) img.setAttribute("loading", "lazy");
  });

  localizeCountryDialOptions();
});

function localizeCountryDialOptions() {
  if (!("Intl" in window) || typeof Intl.DisplayNames !== "function") return;

  var locale = document.documentElement.lang || "en";
  var displayNames;

  try {
    displayNames = new Intl.DisplayNames([locale], { type: "region" });
  } catch (e) {
    return;
  }

  document.querySelectorAll("option[data-countryCode]").forEach(function (option) {
    var regionCode = option.getAttribute("data-countryCode");
    var dialCode = option.value || "";
    if (!regionCode || !dialCode) return;

    var regionName = displayNames.of(regionCode.toUpperCase());
    if (!regionName) return;

    option.textContent = regionName + " (+" + dialCode.replace(/^\+/, "") + ")";
  });
}
