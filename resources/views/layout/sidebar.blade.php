<div class="sidebar" style="width: 15vw; height: 100vh; padding-inline: 10px; margin: 0; border-right: #1a202c solid 1px; display: flex; flex-direction: column; justify-content: space-between">
    <div style="height: 80vh">
        <div style="margin: 17px 0">
            <h3>Hello, {{ auth()->check() ? auth()->user()->username : 'Guest' }}</h3>
        </div>

        <hr class="my-1"  style="border: #1a202c 1px solid">

        <div style="display: flex; flex-direction: column; gap: 20px">
            <a href="/admin/dashboard" style="margin-top: 20px; text-decoration: none; font-size: large; font-weight: bold; color: #1a202c">Dashboard</a>
            <a href="/admin/user/list" style="text-decoration: none; font-size: large; font-weight: bold; color: #1a202c">Data User</a>
            <a href="/admin/profile/" style="text-decoration: none; font-size: large; font-weight: bold; color: #1a202c">Profile</a>
        </div>
    </div>
    <div style="display: flex; height: 5vh; justify-content: left">
        <form action="/admin/logout" method="post" class="d-inline">
            @csrf
            @method('post')
            <button onclick="return confirm('Are you sure you want to Logout')" style="text-decoration: none; font-size: large; font-weight: bold; margin-bottom: 7px; color: #ef4444; border: none; background: white">Logout</button>
        </form>
    </div>
</div>
