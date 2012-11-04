var $ = function (id) { return document.getElementById(id); }

var RegisterForm = function () {
    this.fields = [];
    this.fields["email"] = {};
    this.fields["password"] = {};
    this.fields["verify"] = {};
    this.fields["first_name"] = {};
    this.fields["last_name"] = {};
    
    // Default field messages
    this.fields["email"].message = "Must be a valid email address.";
    this.fields["password"].message = "Must be at least 6 characters.";
    
    // Field error messages
    this.fields["email"].required = "Email is required.";
    this.fields["email"].isEmail = "Email is not valid.";
    this.fields["password"].required = "Password is required.";
    this.fields["password"].tooShort = ["Password is too short.", 4];
    this.fields["verify"].required = "Please retype your password.";
    this.fields["verify"].noMatch = ["Passwords do not match.", "password"];
    this.fields["first_name"].required = "First name is required.";
    this.fields["last_name"].required = "Last name is required.";
}

// Validation methods
RegisterForm.prototype.tooShort = function (text, length) {
    return (text.length < length);
}

RegisterForm.prototype.matches = function (text1, text2) {
    return (text1 == text2);
}

RegisterForm.prototype.isEmail = function (text) {
    if (text.length == 0) return false;
    var parts = text.split("@");
    if (parts.length != 2 ) return false;
    if (parts[0].length > 64) return false;
    if (parts[1].length > 255) return false;
    var address =
        "(^[\\w!#$%&'*+/=?^`{|}~-]+(\\.[\\w!#$%&'*+/=?^`{|}~-]+)*$)";
    var quotedText = "(^\"(([^\\\\\"])|(\\\\[\\\\\"]))+\"$)";
    var localPart = new RegExp( address + "|" + quotedText );
    if ( !parts[0].match(localPart) ) return false;
    var hostnames =
        "(([a-zA-Z0-9]\\.)|([a-zA-Z0-9][-a-zA-Z0-9]{0,62}[a-zA-Z0-9]\\.))+";
    var tld = "[a-zA-Z0-9]{2,6}";
    var domainPart = new RegExp("^" + hostnames + tld + "$");
    if ( !parts[1].match(domainPart) ) return false;
    return true;
}


RegisterForm.prototype.validateField = function (fieldName, text) {
    var field = this.fields[fieldName];
    if (field.required) {
        if ( this.tooShort(text,1) ) {
            throw new Error(field.required);
        }
    }
    if (field.tooShort) {
        if ( this.tooShort(text, field.tooShort[1]) ) {
            throw new Error(field.tooShort[0]);
        }
    }
    if (field.noMatch) {
        if ( ! this.matches(text, $(field.noMatch[1]).value ) ) {
            throw new Error(field.noMatch[0]);
        }
    }
    if (field.isEmail) {
        if ( ! this.isEmail(text) ) {
            throw new Error(field.isEmail);
        }
    }
       
}

// Error message methods
RegisterForm.prototype.resetErrors = function () {
    var message;
    for ( var fieldName in this.fields ) {
        $(fieldName + "_error").className = "";
        message = this.fields[fieldName].message;
        $(fieldName + "_error").firstChild.nodeValue =
            ( message ) ? message : "";
    }
}

RegisterForm.prototype.clearError = function ( fieldName ) {
    $(fieldName + "_error").className = "";
    $(fieldName + "_error").firstChild.nodeValue = "";
}

// Method to validate form
RegisterForm.prototype.validateForm = function () {
    var hasErrors = false;
    for ( var fieldName in this.fields ) {
        this.clearError(fieldName);
        try {
            this.validateField(fieldName, $(fieldName).value );
        } catch (error) {
            hasErrors = true;
            $(fieldName + "_error").className = "error";
            $(fieldName + "_error").firstChild.nodeValue = error.message;
            
        }
    }
    return hasErrors;
}

