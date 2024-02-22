
function GEEKFORGEEKS() {
    const name =
        document.forms.RegForm.Name.value;
    const email =
        document.forms.RegForm.EMail.value;
    const what =
        document.forms.RegForm.Subject.value;
    const password =
        document.forms.RegForm.Password.value;
    const address =
        document.forms.RegForm.Address.value;
		const age =
        document.forms.RegForm.Age.value;
		const d.o.b =
        document.forms.RegForm.D.O.B.value;
		const gender =
        document.forms.RegForm.Gender.value;
     
    console.log(name, email, what, password, address);
 
    if (name === ""
        || name.includes('0') || name.includes('1')
        || name.includes('2') || name.includes('3')
        || name.includes('4') || name.includes('5')
        || name.includes('6') || name.includes('7')
        || name.includes('8') || name.includes('9')) 
    {
        window.alert
        ("Please enter your name properly.");
        name.focus();
        return false;
    }
 
    if (address === "") {
        window.alert
        ("Please enter your address.");
        address.focus();
        return false;
    }
 
    if (email === "" || !email.includes('@')) {
        window.alert
        ("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
 
    if (password === "") {
        alert("Please enter your password");
        password.focus();
        return false;
    }
 
    if (password.length < 6) {
        alert
        ("Password should be atleast 6 character long");
        password.focus();
        return false;
 
    }
	if(age===""){
		alert("please enter your age");
		age.focus();
		return false;
	}
	if(d.o.b){
		alert("the date of birth must be filled")
		d.o.b.focus();
		return false;
}
if(gender){
		alert("the date of birth must be filled")
		gender.focus();
		return false;
}
 
    if (what.selectedIndex === -1) {
        alert("Please enter your course.");
        what.focus();
        return false;
    }
 
    return true;
}
