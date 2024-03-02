<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Account Created Notification</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
  }
  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
  }
  .logo {
    text-align: center;
    margin-bottom: 20px;
  }
  .logo img {
    width: 150px;
    height: auto;
  }
  .content {
    color: #333333;
  }
  .footer {
    margin-top: 20px;
    color: #666666;
    font-size: 14px;
  }
</style>
</head>
<body>
  <div class="container">

    <div class="content">
      <h1 style="font-size: 24px; margin-bottom: 20px;">Welcome to Our Placement cell App!</h1>
      <p style="font-size: 16px; margin-bottom: 20px;">Hello {{$content['name']}},</p>
      <p style="font-size: 16px; margin-bottom: 20px;">We are excited to welcome you to our platform. Your account has been successfully created!</p>
      <p style="font-size: 16px; margin-bottom: 20px;">Email : {{$content['email']}}</p>
      <p style="font-size: 16px; margin-bottom: 20px;">Password : {{$content['password']}}</p>

    </div>
    <div class="footer">
      <p>This is an automated email. Please do not reply to this message.</p>
      <p>You're receiving this email because you recently created an account on Placement App.</p>
    </div>
  </div>
</body>
</html>
