function validateForm()
{
    var email = document.questionForm.email;
    var quest = document.questionForm.question;
    var name = document.questionForm.customername;
    var correctFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    if(!email.value.match(correctFormat)) {
        alert("Incorrect email. Please try again!");
        return false;
    }
    else if (quest.value.length < 25) {
    alert("Question must be at least 25 characters long. Please enter again");
    return false;
}
else if (name.value.length < 10) {
    alert("Name must be at least 10 characters long. Please enter again");
    return false;
}
else {
    alert("Your Question has been logged and will be dealt with as soon as possible. Thank You!");
    return true;
}
}