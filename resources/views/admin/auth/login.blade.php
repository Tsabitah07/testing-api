<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="margin: 0; padding: 0; display: flex; flex-direction: row">
    <div style="width: 45vw; height: 100vh; background: #ef4444">
        <h2 style="color: #fff; padding: 0; margin: 0"></h2>
    </div>
    <div style="width: 55vw; display: flex; flex-direction: column; justify-content: center; align-items: center">
        <h3>Welcome to Admin</h3>
        <hr class="my-2"  style="width: 15vw; border: #1a202c 1px solid">
        <form method="post" action="{{ route('login') }}" style="margin-top: 2vh; width: 20vw; text-align: center;" >
            @csrf
            <div class="mb-2" style="text-align: left; display: flex; flex-direction: column; gap: 5px; margin-bottom: 15px">
                <label for="nis" class="form-label">Name or Email</label>
                <input type="text" class="form-control" id="nis" name="nis" placeholder="input name or email" style="padding: 10px 15px">
            </div>
            <div class="mb-2" style="text-align: left; display: flex; flex-direction: column; gap: 5px; margin-bottom: 1opx">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="input password" style="padding: 10px 15px">
            </div>
            <button type="submit" class="btn" style="background: #1865f4; color: white; font-weight: bold; width: 100%; padding: 11px 0; margin-top: 3vh; border: none; border-radius: 7px">Login</button>
        </form>
    </div>
</body>
</html>
