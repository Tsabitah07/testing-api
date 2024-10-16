<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="margin: 0; padding: 0; display: flex; align-items: center; justify-content: center; height: 100vh;">
    <div style="width: 30vw; height: 70vh; display: flex; flex-direction: column; justify-content: center; align-items: center; background: #37B7C3; border-radius: 7px">
        <h3 style="color: white; font-weight: bold; padding: 0; margin: 0 0 20px 0">Welcome to Admin</h3>
        <hr class="my-2"  style="width: 15vw; border: white 1px solid">
        <form method="get" action="/admin/logins" style="margin-top: 2vh; width: 20vw; text-align: center;" >
            @csrf
            <div class="mb-2" style="text-align: left; display: flex; flex-direction: column; gap: 5px; margin-bottom: 15px">
                <label for="nis" class="form-label" style="color: white; font-weight: bold">Name or Email</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="input name or email" style="padding: 10px 15px">
            </div>
            <div class="mb-2" style="text-align: left; display: flex; flex-direction: column; gap: 5px; margin-bottom: 10px">
                <label for="password" class="form-label" style="color: white; font-weight: bold ">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="input password" style="padding: 10px 15px">
            </div>
            <button type="submit" class="btn" style="cursor: pointer; background: white; color: #37B7C3; font-weight: bold; width: 100%; padding: 11px 0; margin-top: 3vh; border: none; border-radius: 7px">Login</button>
        </form>
    </div>
</body>
</html>
