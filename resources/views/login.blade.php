<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Koperasi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 
  <style>
      * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Segoe UI", sans-serif;
    }

    /* body {
      min-height: 100vh;
      min-width: 100vw;
      margin: 0;
      padding: 0;
      background: #eee;
      overflow-x: hidden;
      display: block;
    } */  
     body{
  background:#eaeaea;
  display:flex;
  justify-content:center;
}

    



    .login-container {
      
      background: linear-gradient(to bottom, #0A9A25, #03340C);
  
      
width:100%;
  max-width:430px;
  min-height:100vh;
  padding-bottom:70px;
  position: fixed;







    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
    }

    .logo-left {
      width: 122px;
      min-width: 98px;
      max-width: 100%;
      height: auto;
      display: block;
    }

    .logo-right {
      display: flex;
      justify-content: flex-end;
      align-items: center;
      flex: 1;
      gap: 8px;
    }
    .logo-right img {
      width: 44px;
      min-width: 26px;
      max-width: 100%;
      height: auto;
      display: block;
    }
    @media (max-width: 600px) {
      .header {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        gap: 0;
      }
     
    }

    .form {
      margin-top: 120px;
      width: 232.32px;
      margin-left: auto;
      margin-right: auto;
    }

    label {
      color: white;
      font-size: 14px;
    }

    input {
      width: 100%;
      padding: 12px;
      border-radius: 12px;
      border: none;
      margin: 8px 0 18px;
      font-size: 14px;
    }

    button {
      width: 100%;
      padding: 14px;
      border-radius: 14px;
      border: none;
      background: #12a826;
      color: white;
      font-size: 18px;
      margin-top: 40px;
      cursor: pointer;
    }

    button:hover {
      background: #0e8c20;
    }

    .switch {
      text-align: center;
      color: white;
      margin-top: 40px;
      font-size: 14px;
    }
    </style>
    
</head>
<body>

  <div class="login-container">
    <!-- Header Logo -->
    <div class="header">
      <img src="logo koprasi.png" class="logo-left">
      <div class="logo-right">
        <img src="Logo_SMK_Negeri_4_Tasikmalaya (1) (1).png">
        <img src="jabar.png">
      </div>
    </div>

    <!-- Form -->
    <div class="form">
    <form action="{{ route('login') }}" method="POST">
      @csrf
      <label>Email</label>
      <input type="email" name="email" placeholder="Email" required>

      <label>Password</label>
      <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Masuk</button>
    </form>
      <p class="switch"> &nbsp; Email</p>
    </div>
  </div>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script>"https://tailwinhttps://cdn.tailwindcss.com"</script>
</body>
</html>