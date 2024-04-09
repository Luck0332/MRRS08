window.onload = function() {
    document.getElementById('popup').style.display = 'block';
  }
  
  function closePopup() {
    document.getElementById('popup').style.display = 'none';
  }
  
  function redirectToLineLogin() {
    window.location.href = "https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id=2004520454&redirect_uri=http://127.0.0.1:8000/fill&state=12345abcde&scope=profile%20openid&nonce=09876xyz"
  }
  