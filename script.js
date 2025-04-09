// admin login
function validateForm() {
    var username = document.forms["loginForm"]["aname"].value;
    var password = document.forms["loginForm"]["apass"].value;

    if (username == "" || password == "") {
        alert("Both username and password must be filled out.");
        return false;
    }
    return true;
}
// new user

        function newForm() {
            var name = document.forms["registrationForm"]["name"].value;
            var password = document.forms["registrationForm"]["pass"].value;
            var email = document.forms["registrationForm"]["mail"].value;
            var department = document.forms["registrationForm"]["dep"].value;

            
            if (name == "") {
                alert("Name must be filled out");
                return false;
            }

            
            if (password == "") {
                alert("Password must be filled out");
                return false;
            }

            
            if (email == "") {
                alert("Email must be filled out");
                return false;
            } else {
                var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
                if (!emailPattern.test(email)) {
                    alert("Invalid email format");
                    return false;
                }
            }

            
            if (department == "") {
                alert("Please select a department");
                return false;
            }

            return true; 
        }

 //user login
            function userForm(event) {
                
                var username = document.getElementById("username").value;
                var password = document.getElementById("password").value;
    
                
                if (username == "" || password == "") {
                    
                    alert("Both username and password must be filled out.");
                    event.preventDefault(); 
                    return false;
                }
    
                
    
                return true; 
            }