var bf = document.getElementById("bfirst");

bf.addEventListener("click", function () {
    if (bf.checked === true){
        document.getElementsByClassName("SOE")[0].style.visibility = 'hidden';
    }

    if (bf.checked === false){
        document.getElementsByClassName("SOE")[0].style.visibility = '';
    }

})
