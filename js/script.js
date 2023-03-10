const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});

/* Formularios */
// Initialize Firebase
var config = {
	apiKey: "AIzaSyD5bCyvYm5adElW2tllyfYH-CXnyQdUxVY",
	authDomain: "contactform-2086d.firebaseapp.com",
	databaseURL: "https://contactform-2086d.firebaseio.com",
	projectId: "contactform-2086d",
	storageBucket: "contactform-2086d.appspot.com",
	messagingSenderId: "35839015044"
};
firebase.initializeApp(config);

// Reference messages collection
var messagesRef = firebase.database().ref("messages");

// Listen for form submit
document.getElementById("contactForm").addEventListener("submit", submitForm);

// Submit form
function submitForm(e) {
	e.preventDefault();

	//Get value
	var name = getInputVal("name");
	var company = getInputVal("company");
	var email = getInputVal("email");
	var phone = getInputVal("phone");
	var message = getInputVal("message");

	// Save message
	saveMessage(name, company, email, phone, message);

	// Show alert
	document.querySelector(".alert").style.display = "block";

	// Hide alert after 3 seconds
	setTimeout(function () {
		document.querySelector(".alert").style.display = "none";
	}, 3000);

	// Clear form
	document.getElementById("contactForm").reset();
}

// Function to get form value
function getInputVal(id) {
	return document.getElementById(id).value;
}

// Save message to firebase
function saveMessage(name, company, email, phone, message) {
	var newMessageRef = messagesRef.push();
	newMessageRef.set({
		name: name,
		company: company,
		email: email,
		phone: phone,
		message: message
	});
}

/* Formularios */