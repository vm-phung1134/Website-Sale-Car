<html>
    <title>Login Web</title>
    <link rel="stylesheet" style="text/css" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
        <body data-vide-bg="video/car6_2">
            <div  class="container">
                    <div class="container_logo">
                        <span class="text1">Star<img src="image/wheel.png" width="60px" height="60px">Car</span>
                        <span class="text2">Register</span>
                    </div>
                <div id='login-form'class='login-page'>
                    <div class="form-box">
                        <div class='button-box'>
                            <div id='btn'></div>
                            <button type='button'onclick='login()'class='toggle-btn'>Log In</button>
                            <button type='button'onclick='register()'class='toggle-btn'>Sign Up</button>
                            <button type='button'onclick='admin()'class='toggle-btn'>Admin</button>
                        </div>
                        <form id='login' class='input-group-login'>
                            <input type='text'class='input-field'placeholder='Email Id'>
                            <input type='password'class='input-field'placeholder='Enter Password'>
                            <input type='checkbox'class='check-box'><span >Remember Password</span>
                            <button type='submit'class='submit-btn'><a href="index.php">Log In</a></button>
                        </form>
                        <form id='register' class='input-group-register'>
                            <input type='text'class='input-field'placeholder='Name' required>
                            <input type='email'class='input-field'placeholder='Email Id' required>
                            <input type='password'class='input-field'placeholder='Enter Password' required>
                            <input type='password'class='input-field'placeholder='Confirm Password'  required>
                            <input type='checkbox'class='check-box'><span >I agree to the terms conditions</span>
                            <button type='submit'class='submit-btn'>Sign Up</button>
                        </form>
                        <form id='admin' class='input-group-admin'>
                            <input type='text'class='input-field'placeholder='Account Admin' required >
                            <input type='password'class='input-field'placeholder='Enter Password' required>
                            <input type='checkbox'class='check-box'><span>Remember Password</span>
                            <button type='submit'class='submit-btn'>Log In</button>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="lib_js/jquery.vide.js"></script>
            <script src="lib_js/login.js"></script>
        </body>
</html>