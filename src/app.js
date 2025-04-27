const NumberData = document.querySelector("#InputField");
const BtnConvert = document.querySelector("#btnconvert");
//  Add class to input Field
NumberData.addEventListener("input", () => {
  if (NumberData.value.length > 0) {
    NumberData.classList.add("fontInput");
  } else {
    NumberData.classList.remove("fontInput");
  }
});

//  Fetch Number from Form
BtnConvert.addEventListener("click", () => {
  const number = NumberData.value;

  fetch("http://localhost/PHP-University/Assingment-Individual/src/api/ConvertAPI.php",{
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
