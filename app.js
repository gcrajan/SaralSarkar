var today = new Date();
console.log(today);
var dd = 1+today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

let lastDayDate = new Date(yyyy, mm, 0);
let lastDay= lastDayDate.getDate();

if (dd > lastDay) {
    dd = 1;
    mm= mm+ 1;
 }
if (dd < 10) {
   dd = '0' + dd;
}
 
if (mm < 10) {
   mm = '0' + mm;
} 

today = yyyy + '-' + mm + '-' + dd;
let lastTodayday= Number(dd)+6;
if (lastTodayday < 10) {
    lastTodayday = '0' + lastTodayday;
 }
let lastToday = yyyy + '-' + mm + '-' + lastTodayday;
document.getElementById("datefield").setAttribute("min", today);
document.getElementById("datefield").setAttribute("max", lastToday);

// --------------profile page-------------- 
function showInformation(){
    document.getElementById("myPost-info-div-profile-section").style.display = 'none';
    document.getElementById("information-info-div-profile-section").style.display = 'block';
    document.getElementById("info-title-info-div-profile-section").style.color = '#FFFFFF';
    document.getElementById("post-title-info-div-profile-section").style.color = '#DED9D9';
    }
    
    function showPost(){
        document.getElementById("information-info-div-profile-section").style.display = 'none';
        document.getElementById("myPost-info-div-profile-section").style.display = 'block';
        document.getElementById("post-title-info-div-profile-section").style.color = '#FFFFFF';
        document.getElementById("info-title-info-div-profile-section").style.color = '#DED9D9';
        }
    

// --------------login page--------------
function signInShow() {
  var element1 = document.getElementById("signUp");
  var element2 = document.getElementById("signIn");
  element1.classList.add("showHide");
  element2.classList.remove("showHide");
}
function signUpShow() {
  var element3 = document.getElementById("signIn");
  var element4 = document.getElementById("signUp");
  element3.classList.add("showHide");
  element4.classList.remove("showHide");
}

/*----------- captcha ------------*/
var code;
function createCaptcha() {
  //clear the contents of captcha div first 
  document.getElementById('captcha').innerHTML = "";
  var charsArray =
  "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
  var lengthOtp = 6;
  var captcha = [];
  for (var i = 0; i < lengthOtp; i++) {
    //below code will not allow Repetition of Characters
    var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
    if (captcha.indexOf(charsArray[index]) == -1)
      captcha.push(charsArray[index]);
    else i--;
  }
  var canv = document.createElement("canvas");
  canv.id = "captcha";
  canv.width = 100;
  canv.height = 50;
  var ctx = canv.getContext("2d");
  ctx.font = "25px Georgia";
  ctx.strokeText(captcha.join(""), 0, 30);
  //storing captcha so that can validate you can save it somewhere else according to your specific requirements
  code = captcha.join("");
  document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
}
function validateCaptcha() {
  event.preventDefault();
  debugger
  if (document.getElementById("cpatchaTextBox").value == code) {
    // alert("Valid Captcha")
    document.getElementById("loginform").submit();

  }else{
    alert("Invalid Captcha. try Again");
    createCaptcha();
  }
}

