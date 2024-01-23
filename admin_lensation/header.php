<header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
               
                
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                       <b>
                            
                            <img src="assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            
                            <img src="assets/images/florence1.png" alt="homepage" class="light-logo sp" />
                        </b>
                       <span class="h">
                         
                         <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                           
                         <b><h3>&nbsp; Lensation</h3></b></span> </a>
                </div>
                
                <div class="navbar-collapse">
                   
                    <ul class="navbar-nav mr-auto">
                       
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark"  href="javascript:void(0)"><i class="fa fa-bars" ></i></a> </li>
                       
                        <li class="nav-item pt-3">
                            <input type="search" onkeyup="getdata('<?php echo $_SESSION['identity']; ?>','search',this.value);" class="form-control" placeholder="Search & enter">
                        </li>
                    </ul>
                    
                </div>
            </nav>
</header>