//
// Document References
//

//Selecting divs for bootstrap class adjustments.
const groupFirstname = document.getElementById('firstname').parentElement;
const groupLastname = document.getElementById('lastname').parentElement;
const groupEmail = document.getElementById('email').parentElement;
const groupPhone = document.getElementById('phone').parentElement;
const groupUsername = document.getElementById('username').parentElement;
const groupPassword = document.getElementById('password').parentElement;
const groupComment = document.getElementById('comment').parentElement;

//Selecting inputs for validation.
const fieldFirstname = document.getElementById('firstname');
const fieldLastname = document.getElementById('lastname');
const fieldEmail = document.getElementById('email');
const fieldPhone = document.getElementById('phone');
const fieldUsername = document.getElementById('username');
const fieldPassword = document.getElementById('password');
const fieldComment = document.getElementById('comment');

// Selecting spans for helper text.
const helperFirstname = document.getElementById('firstnameHelper');
const helperLastname = document.getElementById('lastnameHelper');
const helperEmail = document.getElementById('emailHelper');
const helperPhone = document.getElementById('phoneHelper');
const helperUsername = document.getElementById('usernameHelper');
const helperPassword = document.getElementById('passwordHelper');
const helperComment = document.getElementById('commentHelper');

//
// Validation
//

function clearStatus(groupReference)
{
    groupReference.classList.remove('has-success');
    groupReference.classList.remove('has-error');
}

function updateStatus(groupReference, helperReference, hasError, helperText)
{
    if (hasError)
    {
        groupReference.classList.add('has-error');
    }
    else
    {
        groupReference.classList.add('has-success');
    }

    helperReference.innerHTML = helperText;
}

function checkName(groupReference, fieldReference, helperReference)
{
    let hasError = false;
    let helperText = '';

    clearStatus(groupReference);

    if (!fieldReference.value.match(/^.{2,}$/))
    {
        hasError = true;
        helperText += 'Must be at least 2 characters. ';
    }

    if (!fieldReference.value.match(/^[a-zA-Z\-\']{0,}$/))
    {
        hasError = true;
        helperText += 'Must only include letters, hyphens, and apostrophes.';
    }

    updateStatus(groupReference, helperReference, hasError, helperText);
}

function checkEmail(groupReference, fieldReference, helperReference)
{
    let hasError = false;
    let helperText = '';

    clearStatus(groupReference);

    if (!fieldReference.value.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))
    {
       hasError = true;
       helperText += 'Must use a valid email address.'
    }

    updateStatus(groupReference, helperReference, hasError, helperText);
}

function checkPhone(groupReference, fieldReference, helperReference)
{
    let hasError = false;
    let helperText = '';

    clearStatus(groupReference);

    if (!fieldReference.value.match(/^.{10}$/))
    {
        hasError = true;
        helperText += 'Must be exactly 10 characters. ';
    }

    if (!fieldReference.value.match(/^[0-9]{0,}$/))
    {
        hasError = true;
        helperText += 'Must be numbers only.';
    }

    updateStatus(groupReference, helperReference, hasError, helperText);
}

function checkLogin(groupReference, fieldReference, helperReference)
{
    let hasError = false;
    let helperText = '';

    clearStatus(groupReference);

    if (!fieldReference.value.match(/^.{6,}$/))
    {
        hasError = true;
        helperText += 'Must be at least 6 characters.';
    }

    updateStatus(groupReference, helperReference, hasError, helperText);
}

function checkComment(groupReference, fieldReference, helperReference)
{
    let hasError = false;
    let helperText = '';

    clearStatus(groupReference);

    if (!fieldReference.value.match(/^.{1,}$/))
    {
        hasError = true;
        helperText += 'Must be at least 1 character.';
    }

    updateStatus(groupReference, helperReference, hasError, helperText);
}

fieldFirstname.addEventListener('keyup', () => { checkName(groupFirstname, fieldFirstname, helperFirstname); }, false);
fieldLastname.addEventListener('keyup', () => { checkName(groupLastname, fieldLastname, helperLastname); }, false);
fieldEmail.addEventListener('keyup', () => { checkEmail(groupEmail, fieldEmail, helperEmail); }, false);
fieldPhone.addEventListener('keyup', () => { checkPhone(groupPhone, fieldPhone, helperPhone); }, false);
fieldUsername.addEventListener('keyup', () => { checkLogin(groupUsername, fieldUsername, helperUsername); }, false);
fieldPassword.addEventListener('keyup', () => { checkLogin(groupPassword, fieldPassword, helperPassword); }, false);
fieldComment.addEventListener('keyup', () => { checkComment(groupComment, fieldComment, helperComment); }, false);