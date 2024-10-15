<div class="sidebar" style="width: 15vw; height: 100vh; padding-inline: 10px; margin: 0; border-right: #1a202c solid 1px; display: flex; flex-direction: column; justify-content: space-between">
    <div style="height: 80vh">
        <div style="margin: 11.5px 0">
            <h3 style="font-weight: bold">Hello, Admin</h3>
        </div>

        <hr class="my-2"  style="border: #1a202c 1px solid">

        <div style="display: flex; flex-direction: column; gap: 20px">
            <a href="/admin/dashboard" style="margin-top: 20px; text-decoration: none; font-size: large; font-weight: bold">Dashboard</a>
            <a href="/admin/mentor" style="text-decoration: none; font-size: large; font-weight: bold">Data User</a>
            <a href="/admin/student" style="text-decoration: none; font-size: large; font-weight: bold">Profile</a>
        </div>
    </div>
    <div style="display: flex; height: 5vh; justify-content: left">
        <form action="/auth/logout" method="post" class="d-inline">
            @csrf
            @method('post')
            <button onclick="return confirm('Are you sure you want to Logout')" style="text-decoration: none; font-size: large; font-weight: bold; margin-bottom: 7px; color: #ef4444; border: none; background: white">Logout</button>
        </form>
    </div>
</div>
