var buttonElement = document.getElementById("btn_submit");

var FirstNameElement = document.getElementById("form-firstname");


buttonElement.addEventListener('click' , function(){

    console.log(FirstNameElement.value.length);

    if(FirstNameElement.value.length == 0){

        FirstNameElement.value = "This input field is empty";

        FirstNameElement.classList.add("ColorElement");

    }

    
});
