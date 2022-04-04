<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<form action="action_login.php" class="Form" method="POST">
  <h1 class="Form-title">Login Admin Chick 'N Tea</h1>
  <p class="Form-description">please login first to continue Admin Dashboard</p>
  <div class="Form-fields">
      <input type="email"
             name="email"
             class="ControlInput ControlInput--email"
             placeholder=" Example@email.com"
             required
      >
      <label for="email"
             class="Control-label Control-label--email"
      >Email</label>
      <div class="Control-requirements Control-requirements--email">
        Must be a valid email
      </div>
        <label for="show-password" style="font-weight:bold;">
            Password
        </label>
    
        <input type="password"
               name="pass"
               placeholder="******** "
               autocomplete="off"
               autocapitalize="off"
               autocorrect="off"
               required
               pattern=".{6,}"
               class="ControlInput ControlInput--password"
        >
    
        <div class="Control-requirements">
          Must contain at least 6 characters. We did this for your own sake.
        </div>
      
      
        <input type="submit" class="Button Form-submit" value="Login" name="submit">
    
    
  </div>
</form>
</body>
</html>