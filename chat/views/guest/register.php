<?php

use components\View;

/**
 * @var View $this
 */

?>
<form method="post">
    <h1 class="h3 mb-3 mt-3 fw-normal">Please register</h1>

    <div class="mb-3">
        <label for="inputName" class="visually-hidden">Name</label>
        <input type="text"
               name="name"
               value="<?= $registerData['name'] ?? '' ?>"
               id="inputName"
               class="form-control"
               placeholder="Name"
               required>
    </div>

    <div class="mb-3">
        <label for="inputEmail" class="visually-hidden">Email address</label>
        <input type="email"
               name="login"
               value="<?= $registerData['login'] ?? '' ?>"
               id="inputEmail"
               class="form-control"
               placeholder="Email address"
               required>
    </div>

    <div class="mb-3">
        <label for="inputPassword" class="visually-hidden">Password</label>
        <input type="password"
               name="password"
               value="<?= $registerData['password'] ?? '' ?>"
               id="inputPassword"
               class="form-control"
               placeholder="Password"
               required>
    </div>

    <div class="mb-3">
        <label for="inputRepeatPassword" class="visually-hidden">Repeat Password</label>
        <input type="password"
               name="repeat_password"
               value="<?= $registerData['repeat_password'] ?? '' ?>"
               id="inputRepeatPassword"
               class="form-control"
               placeholder="Repeat Password"
               required>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
</form>


<p class="text-center mt-2">
    <a href="/guest/login">or login</a>
</p>
