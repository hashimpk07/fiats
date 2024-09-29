<?php if( \Illuminate\Support\Facades\Auth::check() ) { ?>
<div class="dropdown-multiple ">
    <button class="dropbtn">WELCOME ADMIN</button>
    <div class="dropdown-content">
        <a href="{{ url('password_change') }}">Change Password</a>
        <a href="{{ action('LoginController@logout') }}">Log Out</a>

    </div>
</div>
<?php } else { ?>

<div style="min-height: 60px;"></div>

<?php } ?>