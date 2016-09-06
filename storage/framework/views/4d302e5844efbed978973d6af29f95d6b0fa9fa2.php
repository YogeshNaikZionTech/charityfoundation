
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Charity Foundation</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav pull-right">
                <li class="active"><a href="/   ">Home</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Projects</a></li>
                <li><a href="">Events</a></li>
                <li><a href="">Contact Us</a></li>
                <?php if(Auth::guest()): ?>
                    <li><a href=<?php echo e(url('/register')); ?>>Sign Up</a></li>
                    <li><a href="<?php echo e(url('/login')); ?>" >Login</a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo e(url('/logout')); ?>"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>


                <li><a href="" ><button class="btn btn-success">Donate</button></a></li>
            </ul>
        </div>
    </div>
</nav>