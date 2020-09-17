<style>
    .hve a:hover {
        background-color: #dbdbdb;
    }
    .bc:hover{
        color: #db1818;
    }
</style>
<div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-white fixed-top">
        <a class="navbar-brand" href="index.php">
            <p class="m-auto">Diklat-Online</p>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <?php if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') : ?>
                <a class="nav-item nav-link nav1 m-auto" href="admin/index.php"><span>Admin</span></a>
                <?php elseif (isset($_SESSION['level']) && $_SESSION['level'] == 'superadmin') : ?>
                <a class="nav-item nav-link nav1 m-auto" href="admin/index.php"><span>Super Admin</span></a>
                <?php else : ?>
                
                <?php endif; ?>
                <a class="nav-item nav-link nav1 m-auto" href="https://www.kemkes.go.id/" target="_BLANK"><span><?php echo $_SESSION['tempat']; ?></span></a>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <span class="bc navbar-badge"><i class="far fa-bell"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right hve">
                        <a href="?page=<?php echo session_id(); ?>&page=profile" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="d-flex dropdown-item-title" style="color: #212529;">
                                        <span class="d-flex justify-content-left" style="font-size: 18px;text-align:start;">Profile</span>
                                        <span class="d-flex justify-content-end" style="font-size: 10px;">Diproses</span>
                                    </h3>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user-circle" style="text-transform:uppercase"> <?php echo $_SESSION['user']; ?></i>
                        <span class="badge badge-danger navbar-badge"><i class="fas fa-caret-down"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right hve">
                        <a href="?page=<?php echo session_id(); ?>&page=profile" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title" style="color: #212529;">
                                        <span style="font-size: 18px;">Profile</span>
                                        <span class="float-right text-sm text-danger"><i class="fas fa-user" style="font-size: 1rem"></i></span>
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title" style="color: #212529;">
                                        <span style="font-size: 18px;">Bantuan</span>
                                        <span class="float-right text-sm text-muteda"><i class="fas fa-question" style="font-size: 1rem"></i></span>
                                    </h3>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout.php" style="text-align: center;color: #d9534f;" class="d dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>