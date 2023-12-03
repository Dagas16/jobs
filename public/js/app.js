document.getElementById("add-experience-btn").addEventListener("click", () => {
  const cvForm = document.getElementById("cv-form");

  cvForm.classList.toggle("flex");
  cvForm.classList.toggle("hidden");

  if (cvForm.classList.contains("flex")) {
    cvForm.scrollIntoView({ behavior: "smooth" });
  }
});
