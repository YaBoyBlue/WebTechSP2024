//
// Document References
//

//Selecting divs for bootstrap class adjustments.
const groupUsername = document.getElementById('username').parentElement;
const groupPassword = document.getElementById('password').parentElement;

//Selecting inputs for validation.
const fieldUsername = document.getElementById("username");
const fieldPassword = document.getElementById("password");

// Selecting spans for helper text.
const helperUsername = document.getElementById("usernameHelper");
const helperPassword = document.getElementById("passwordHelper");

//
// Validation
//

function checkUsername()
{
    let hasError = false;

    let helperText = '';

    groupUsername.classList.remove('has-success');
    groupUsername.classList.remove('has-error');

    if (fieldUsername.value.length < 5)
    {
        hasError = true;

        helperText += 'Username must be 5 characters or more. ';
    }
    
    if (hasError)
    {
        groupUsername.classList.add('has-error');
    }
    else
    {
        groupUsername.classList.add('has-success');
    }

    helperUsername.innerHTML = helperText;
}

function checkPassword()
{
    let hasError = false;

    let helperText = '';

    groupPassword.classList.remove('has-success');
    groupPassword.classList.remove('has-error');

    if (fieldPassword.value.length < 5)
    {
        hasError = true;

        helperText += 'Must be 5 characters or more. ';
    }

    if (!(fieldPassword.value.includes('!')) && !(fieldPassword.value.includes('?')) && !(fieldPassword.value.includes('.')))
    {
        hasError = true;

        helperText += 'Must contain at least one special character ("!", "?", ".").';
    }

    if (hasError)
    {
        groupPassword.classList.add('has-error');
    }
    else
    {
        groupPassword.classList.add('has-success');
    }

    helperPassword.innerHTML = helperText;
}

