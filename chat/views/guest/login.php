<?php

use components\View;

/**
 * @var View $this
 */

?>
<form method="post">
    <h1 class="h3 mb-3 mt-3 fw-normal">Please sign in</h1>
    <div class="mb-3">
        <label for="inputEmail" class="visually-hidden">Email address</label>
        <input type="email"
               name="login"
               id="inputEmail"
               class="form-control"
               placeholder="Email address"
               required>
    </div>
    <div class="mb-3">
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password"
               name="password"
               id="inputPassword"
               class="form-control"
               placeholder="Password"
               required>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign In</button>
</form>

<p class="text-center mt-2">
    <a href="/guest/register">or register</a>
</p>
