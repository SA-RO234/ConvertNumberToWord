<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert to Number to Word</title>
    <!-- Taiwind CSS -->
    <link rel="stylesheet" href="/src/style/output.css">
</head>

<body class="select-none">
    <div class="container w-[50%] m-[100px_auto] ">
        <h1 class="text-[40px] font-bold text-center">Number to Word Caculator</h1>
        <h1 class="text-center text-[30px] font-bold pb-[3rem]">Can Convert from <span class="text-red-700">1</span> To <span class="text-red-700">9999</span></h1>
        <div class="items-end flex justify-center gap-[20px]">
            <div class="form-group w-full flex-col flex gap-[10px]">
                <label for="data" class="text-[30px] font-bold">Please Input Your Data : </label>
                <input class="input" id="InputField" name="number" placeholder="បញ្ចូលលេខសម្រាប់បំលែង">
            </div>
            <button class="btn" id="btnconvert" type="button">Convert</button>
        </div>
        <h1 class="text-[30px] font-bold pt-[40px] pb-[40px]">Resut : </h1>
        <div class="result-container w-full flex flex-col gap-[20px]">
            <div class="flex jutify-between gap-[10px] items-center">
                <h1 class="text-[30px] w-[20%] text-red-700 font-bold">English :</h1>
                <h1 id="english" class="input Show text-[25px] cursor-text flex justify-start items-center font-normal  w-[80%] border-2 border-black rounded-[5px]"></h1>
            </div>
            <div class="flex jutify-between gap-[10px] items-center">
                <h1 class="text-[30px] w-[20%] text-red-700 font-bold">Khmer :</h1>
                <h1 id="khmer" class="input text-[25px] cursor-text flex justify-start items-center  w-[80%] border-2 border-black rounded-[5px]"></h1>
            </div>
            <div class="flex jutify-between gap-[10px] items-center">
                <h1 class="text-[30px] text-red-700  w-[20%] font-bold">Dollar :</h1>
                <h1 id="dollar" class="input Show text-[25px] cursor-text font-normal flex justify-start items-center   w-[80%] border-2 border-black rounded-[5px]"></h1>
            </div>
        </div>
    </div>
</body>
<!-- JS -->
<script src="/src/app.js"></script>

</html>