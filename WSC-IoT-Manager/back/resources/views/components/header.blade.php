<header>
   <a href='/xxx-m2.wsr.ru'><h2>IoT Manager</h2></a>
   <div class="header__links">
      <a href="/xxx-m2.wsr.ru/" class=''>Projects</a>
      <a href="/xxx-m2.wsr.ru/modules" class=''>Modules</a>
      @auth
      <a href="/xxx-m2.wsr.ru/user" class=''>{{ auth()->user()->email }}</a>
      <a href="/xxx-m2.wsr.ru/logout" class=''>Logout</a>
      @else
      <a href="/xxx-m2.wsr.ru/login" class=''>Login</a>
      <a href="/xxx-m2.wsr.ru/register" class=''>Register</a>
      @endauth
   </div>
</header>

<style>
   header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px 5%;
      background-color: rgb(254,254,254,.05);
      box-shadow:0 0 10px 1px rgb(254,254,254,.05);
   }
   .header__links {
      display: flex;
      justify-content: center;
      align-items: center;
      gap:10%
   }
</style>