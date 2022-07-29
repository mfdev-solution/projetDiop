<?php require_once "head.php"; ?>
<div class="container ">
    <form class="" action="../index.php" method="post"style="width:50%;margin:15% auto;padding:50px 10%;">
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="login">login</label>
            <input type="text" id="login" name="login"class="form-control" />
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <label class="form-label" for="passwd">mot de passe</label>
            <input type="password" id="passwd" name="passwd" class="form-control" />
        </div>

        <!-- Submit button -->
        <div class="text-center mb-4">
            <button type="submit" class="btn btn-primary btn-block mb-4" name="sign">Sign in</button>
        </div>
    </form>

</div>
