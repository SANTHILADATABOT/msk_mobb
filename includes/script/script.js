alert("script loaded");

var family_no = $('#family_no').val();
var mohalla_no = $('#mohalla_no').val();
var aadhar_no = $('#aadhar_no').val();
var door_no = $('#door_no').val();
var street_name = $('#street_name').val();
var nagar = $('#nagar').val();
var date = $('#date').val();
var contact_no = $('#contact_no').val();
var mother_tongue = $('#mother_tongue').val();
var ration_card_no = $('#ration_card_no').val();
var house = $('#house').val();
var bathroom_availability = $('#bathroom_availability').val();
var economic_status = $('#economic_status').val();

function  validateForm1() {

    console.log('working');

    if(family_no == ''){
        alert("Please select Yes or No for Family No.");
        return false;
    }
    
    if(mohalla_no == ''){
        alert("Please select Yes or No for Mohalla No.");
        return false;
    }
    
    if(aadhar_no == ''){
        alert("Please select Yes or No for AAadhar No.");
        return false;
    }
    
    if(door_no == ''){
        alert("Please wnter your Door No.");
        $('#door_no').focus();
        return false;
    }
    
    if(street_name == ''){
        alert("Please enter your Street Name.");
        $('#street_name').focus();
        return false;
    }
    
    if(nagar == ''){
        alert("Please enter your Nagar.");
        $('#nagar').focus();
        return false;
    }
    
    if(date == ''){
        alert("Please enter Date.");
        return false;
    }
    
    if(contact_no == ''){
        alert("Please enter your Contact No.");
        $('#contact_no').focus();
        return false;
    }
    
    if(mother_tongue == ''){
        alert("Please choose your Mother Tongue.");
        return false;
    }
    
    if(ration_card_no == ''){
        alert("Please select Yes or No for Ration Card No.");
        return false;
    }
    
    if(house == ''){
        alert("Please select your type of House.");
        return false;
    }
    
    if(bathroom_availability == ''){
        alert("Please choose Yes or No for availability of Toilet/Bathroom.");
        return false;
    }
    
    if(economic_status == ''){
        alert("Please choose your Family's Economic Status.");
        return false;
    }
}



