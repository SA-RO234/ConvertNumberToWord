<?php

function convertNumberToDollar($number){
    return '$' . number_format($number, 0);
}
