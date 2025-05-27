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
  fetch("/src/api/ConvertAPI.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ number: number }),
  })
    .then((response) => {
      if (!response.ok) throw new Error("Network response was not ok");
      return response.text();
    })
    .then((text) => {
      let data;
      try {
        console.log(data);
        data = JSON.parse(text);
      } catch (e) {
        TextError.textContent = "Server error: Invalid JSON response.";
        return;
      }
      if (data.success) {
        document.getElementById("english").textContent = data.result.english;
        document.getElementById("khmer").textContent = data.result.khmer;
        document.getElementById("dollar").textContent = data.result.dollar;
        // Update main and sidebar history UI after conversion
        renderHistory(data.history);
      } else if (data.error) {
        TextError.textContent = data.error;
      }
    });
});

// Fetch and render history on page load (directly from history.txt)
function fetchAndRenderHistory() {
  fetch("/storage/history.txt")
    .then((response) => {
      if (!response.ok) throw new Error("Network response was not ok");
      return response.text();
    })
    .then((text) => {
      // Split lines and filter out empty lines
      const lines = text.split("\n").filter((line) => line.trim() !== "");
      renderHistory(lines);
    })
    .catch(() => {
      renderHistory([]);
    });
}

// Render history in both main and sidebar
function renderHistory(historyArr) {
  // Sidebar history
  const sidebarHistory = document.getElementById("sidebarHistory");
  sidebarHistory.innerHTML = "";
  if (!historyArr || historyArr.length === 0) {
    sidebarHistory.innerHTML =
      '<div style="color: #9ca3af; font-size: 14px; padding: 12px;">No history yet</div>';
    return;
  }

  historyArr.forEach((line) => {
    const parts = line.split("|");
    if (parts.length === 3) {
      const date = parts[0].trim();
      const number = parts[1].trim();
      let resultObj;
      try {
        const cleanedJSON = parts[2].trim().replace(/\\"/g, '"'); // 🛠️ FIX HERE
        resultObj = JSON.parse(cleanedJSON);
      } catch (e) {
        resultObj = { english: "", khmer: "", dollar: "" };
      }
      // Sidebar
      const btn = document.createElement("button");
      btn.className = "w-full text-left p-2 font-fav";
      btn.innerHTML = `${resultObj.khmer ? resultObj.khmer : number}`;
      btn.title = `Date: ${date}\nNumber: ${number}\nEnglish: ${resultObj.english}\nDollar: ${resultObj.dollar}`;
      btn.addEventListener("click", () => {
        NumberData.value = number;
        NumberData.focus();
      });
      sidebarHistory.appendChild(btn);
    }
  });
}
fetchAndRenderHistory();
// Call on page load
window.addEventListener("DOMContentLoaded", fetchAndRenderHistory);
// Sidebar toggle functionality
const mainContent = document.getElementById("mainContent");
const sidebar = document.getElementById("sidebar");
const scrollContent = document.getElementById("scrollContent");
sidebar.classList.add("collapsed");
mainContent.classList.add("expanded");
document.getElementById("toggleSidebar").addEventListener("click", function () {
  sidebar.classList.toggle("collapsed");
  mainContent.classList.toggle("expanded");
});
scrollContent.addEventListener("click", function (e) {
  sidebar.classList.add("collapsed");
  mainContent.classList.add("expanded");
});

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
    const sidebar = document.getElementById("sidebar");
    if (sidebar.classList.contains("collapsed")) {
      sidebar.classList.remove("collapsed");
      document.getElementById("mainContent").classList.remove("expanded");
    }
    setTimeout(() => searchInput.focus(), 300);
  }
});

// Enter key support for input field
NumberData.addEventListener("keypress", (e) => {
  if (e.key === "Enter") {
    BtnConvert.click();
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const sidebar = document.getElementById("sidebar");
  const closeSidebarBtn = document.getElementById("closeSidebar");
  const toggleSidebarBtn = document.getElementById("toggleSidebar");

  if (closeSidebarBtn) {
    closeSidebarBtn.addEventListener("click", function () {
      sidebar.classList.add("closed");
    });
  }
  if (toggleSidebarBtn) {
    toggleSidebarBtn.addEventListener("click", function () {
      sidebar.classList.remove("closed");
    });
  }
});
