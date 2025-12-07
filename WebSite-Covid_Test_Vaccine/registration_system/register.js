const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const direct_sign_up_btn = document.querySelector("#directSignUpBtn"); // Add this line
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// Event listener for direct sign up button
if (direct_sign_up_btn) {
  direct_sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
  });
}


