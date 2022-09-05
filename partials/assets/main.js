//Validation for date format
$(document).ready(function(){

var todayDate = new Date();
    var month = todayDate.getMonth() +1; 
    var year = todayDate.getUTCFullYear() ; 
    var day = todayDate.getDate()+1; 
    // if(month==1||3||5||7||8||10 && day==32){
    //   month+=1;
    //   day=1;
    // }
    // if(month==2||4||6||9||11 && day==31){
    //   month+=1;
    //   day=1;
    // }
    // if(month==12){
    //   year+=1;
    //   month=1;
    //   day=1;
    // }

    if(month < 10){
      month = "0" + month.toString();
    }
    if(day < 10){
      day = "0" + day.toString();
    }
    var minDate = year + "-" + month + "-" + day;
    $('#date').attr('min',minDate);
});

//Validation For multi-select dropdown.
var subjectObject = {
  "General Physician": {
    "Dr. Shivani Pathak":[],
    "Dr. Shreyansh Vyas":[],
    "Dr. Shivangi Bangar":[]   
  },
  "Dermatology": {
    "Dr. Prabhav Jain":[],
    "Dr. Srijan Agrawal":[],
    "Dr. Nikhil Saxena":[]  
  },
  "ENT Specialists": {
    "Dr. Divyansh Nafde":[],
    "Dr. Rohit Chouhan":[],
    "Dr. Ronak Chouhan":[]
  },
    "Cardiology": {
      "Dr. Preet Bairagi":[],
      "Dr. Ruchika Upadhyay":[],
      "Dr. Ashish Mishra":[]   
    },
    "Paediatrics": {
      "Dr. Yashraj Solanki":[],
      "Dr. Aradhya Singhi":[],
      "Dr. Sanjay Bisht":[]   
    },
    "Nephrology": { 
      "Dr. Abhinandan Singh":[],
      "Dr. Utkarsh Mahajan":[],
      "Dr. Ranveer Jangid":[] 
    }
  }
  window.onload = function() {
    var subjectSel = document.getElementById("dep");
    var topicSel = document.getElementById("dr");
    for (var x in subjectObject) {
      subjectSel.options[subjectSel.options.length] = new Option(x, x);
    }
    subjectSel.onchange = function() {
      //empty Chapters- and Topics- dropdowns
      
      topicSel.length = 1;
      //display correct values
      for (var y in subjectObject[this.value]) {
        topicSel.options[topicSel.options.length] = new Option(y, y);
      }
    } 
  }
  document.querySelectorAll('.form-outline').forEach((formOutline) => {
    new mdb.Input(formOutline).init();
  });

// Validation for e-mail 
  const email = document.getElementById("mail");

email.addEventListener("input", function (event) {
  if (email.validity.typeMismatch) {
    email.setCustomValidity("I am expecting an e-mail address!");
    email.reportValidity();
  } else {
    email.setCustomValidity("");
  }
});

// Validation for empty space submission
function validate(input){
  if(/^\s/.test(input.value))
    input.value = '';
}