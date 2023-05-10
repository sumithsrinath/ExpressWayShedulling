// Get the modal element
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementsByTagName("button")[0];

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
function showDetails() {
  modal.style.display = "block";
}

//Submit data for available



//logout
function logout(){
  window.location.href = 'booking&loginRegistrer/logout.php';
}

function display(){
  alert ("Successfull");
}

// When the user clicks on <span> (x), close the modal
function closeDetails() {
  modal.style.display = "none";
}

function load(){
  window.location.href = 'index.html';
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
