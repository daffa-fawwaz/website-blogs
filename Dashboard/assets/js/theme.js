var checkbox = document.getElementById("toggle");
      var checkboxMobile = document.querySelector("#toggle-mobile");

      checkbox.addEventListener("click", function () {
        if (checkbox.checked) {
          document.documentElement.classList.add("dark");
          localStorage.theme = "dark";
        } else {
          document.documentElement.classList.remove("dark");
          localStorage.theme = "light";
        }
      });
      checkboxMobile.addEventListener("click", function () {
        if (checkboxMobile.checked) {
          document.documentElement.classList.add("dark");
          localStorage.theme = "dark";
        } else {
          document.documentElement.classList.remove("dark");
          localStorage.theme = "light";
        }
      });