document.addEventListener("DOMContentLoaded", function () {
  const modal = document.querySelector("#language-modal");

  if (modal && !localStorage.getItem("egyptdoudou_language_selected")) {
    modal.classList.add("is-open");
    modal.setAttribute("aria-hidden", "false");
  }

  document.querySelectorAll("[data-language-choice]").forEach(function (link) {
    link.addEventListener("click", function () {
      localStorage.setItem("egyptdoudou_language_selected", "1");
    });
  });

  document.querySelectorAll("[data-language-close]").forEach(function (button) {
    button.addEventListener("click", function () {
      localStorage.setItem("egyptdoudou_language_selected", "1");
      modal.classList.remove("is-open");
      modal.setAttribute("aria-hidden", "true");
    });
  });
});
