const NumberData = document.querySelector("#InputField");
const BtnConvert = document.querySelector("#btnconvert");
const TextError = document.querySelector("#texterror");
//  Add class to input Field
NumberData.addEventListener("input", () => {
  if (NumberData.value.length > 0) {
    NumberData.classList.add("fontInput");
  } else {
    NumberData.classList.remove("fontInput");
  }
  //  Validate Digit
  if (NumberData.value.length > 8) {
    NumberData.classList.add("border-error");
    TextError.textContent = "សូមបញ្ចូលត្រឹមតែ 8 ខ្ទង់ប៉ុណ្ណោះ!";
  } else {
    NumberData.classList.remove("border-error");
    TextError.textContent = "";
  }
});

//  Fetch Number from Form
BtnConvert.addEventListener("click", () => {
  const number = NumberData.value;

  fetch(
    "http://localhost/PHP-University/Assingment-Individual/src/api/ConvertAPI.php",
    {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ number: number }),
    }
  )
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("english").textContent = data.english;
      document.getElementById("khmer").textContent = data.khmer;
      document.getElementById("dollar").textContent = data.dollar;
    })
    .catch((error) => console.error("Error : ", error));
});

//  Open close sidebar

const sidebar = document.getElementById("sidebar");
const toggleBtn = document.getElementById("toggleSidebar");

function openSidebar() {
 sidebar.classList.toggle("w-[20%]");
 sidebar.classList.toggle("hidden");
}
// Event listeners
toggleBtn.addEventListener("click", openSidebar);

// Handle search functionality
const searchInput = document.querySelector('input[placeholder="Search chats"]');
searchInput.addEventListener("keydown", (e) => {
  if ((e.ctrlKey || e.metaKey) && e.key === "k") {
    e.preventDefault();
    searchInput.focus();
  }
});

// Global keyboard shortcut for search
document.addEventListener("keydown", (e) => {
  if ((e.ctrlKey || e.metaKey) && e.key === "k") {
    e.preventDefault();
    openSidebar();
    setTimeout(() => searchInput.focus(), 300);
  }
});
