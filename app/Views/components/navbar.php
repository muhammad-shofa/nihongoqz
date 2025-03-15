<nav class="navbar navbar-expand-lg navbar-dark mt-3 mx-5 rounded-5">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">Nihongoqz</a>
        <!-- <div> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/learn-kana">Learn Kana</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/hiragana-test">Hiragana Test</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/katakana-test">Katakana Test</a>
                </li>
            </ul>

            <?php
            $session = session();
            if ($session->has('is_login') && $session->get('is_login') === true) { ?>
                <div class="d-flex gap-2 align-items-center">
                    <a href="/profile">
                        <img src="/img/profile.png" alt="Profile" class="rounded-5 border border-3" width="50px">
                    </a>
                </div>
            <?php } else { ?>
                <div class="d-flex gap-2 align-items-center">
                    <a href="/login" class="btn-nav-login">Login</a>
                    <a href="/register" class="btn-nav-register">Register</a>
                </div>
            <?php }  ?>
        </div>
        <!-- </div> -->
    </div>
</nav>