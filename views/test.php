

<a href="?page=homepage">Accueil</a>
                   
                   <a href="?page=contact">Contact</a>

                   <?php if (!isset($_SESSION['logged']) || !$_SESSION['logged']) { ?>
                       <a href="?page=login">Se connecter</a>
                       <a href="?page=register">S'inscrire</a>
                   <?php } ?>
                   
                   <?php if (isset($_SESSION['logged']) && $_SESSION['logged']) { ?>
                       <a href="?page=disconnect" style="--i:3;"> Se déconnecter</a>
                   
                       <a href="?page=shoppingcart">
                               <i class="fa-solid fa-cart-shopping"></i>
                               <span> 
                               <?php if(is_null($_SESSION['cart'])){
                                   echo 0;
                               }else{
                                   echo count($_SESSION['cart']);
                               }?>
                               </span>   
                       </a>

                   <?php } ?>

                   <!-- <?php // if (isset($_SESSION['admin']) && $_SESSION['admin']) { ?>
                       <a href="?page=login" style="--i:1;">Administration</a>
                   <?php // } ?> -->






                   <header class="bg">
                <nav class="container relative h-14 flex justify-between items-center">
                    <div>
                        <a href="?page=homepage"><img src="assets/images/favicon.png" class="w-24 " alt="logo">
                        </a>
                    </div>

                    <div>
                        <ul>
                            <li>
                                <a href="?page=homepage">Accueil</a>
                            </li>

                            <li>
                                <a href="?page=homepage">Accueil</a>
                            </li>

                        </ul>

                        <div>
                            <i class="ri-close-line"></i>
                        </div>

                        <div class="flex items-center gap-5">
                            <i class="ri-moon-line cursor-pointer ml-4 text-xl" id="theme-toggle"></i>

                        <div class="md:hidden" id="hamburger">
                            <i class="ri-menu-2-line cursor-pointer text-xl"></i>
                        </div>
                        </div>

                    </div>

                    <!-- <i class="ri-menu-2-line"></i> -->
                </nav>

            <?php ?>
    </header>



    <header>
      <nav>
        <div>
            <a href="?page=homepage"><img src="assets/images/favicon.png" class="logo" alt="logo">
            </a>
        </div>

        <div>
          <ul>

            <li>
              <a href="?page=homepage" class="nav__link text-secondaryColor hover:text-secondaryColor ease-in duration-200">Accueil</a>
            </li>

            <li>
              <a href="?page=register" class="nav__link hover:text-secondaryColor ease-in duration-200">Inscription</a>
            </li>

            <li>
              <a href="#menu" class="nav__link hover:text-secondaryColor ease-in duration-200">Menu</a>
            </li>

            <li>
              <a href="#review" class="nav__link hover:text-secondaryColor ease-in duration-200">Review</a>
            </li>

            <li>
              <a href="#contact" class="nav__link hover:text-secondaryColor ease-in duration-200">Contact</a>
            </li>
            
          </ul>

          <div class="absolute top-[0.7rem] right-4 text-2xl cursor-pointer md:hidden" id="nav-close">
            <i class="ri-close-line"></i>
          </div>
        </div>

        <div class="flex items-center gap-5">
          

          <div class="md:hidden" id="hamburger">
            <i class="ri-menu-2-line cursor-pointer text-xl"></i>
          </div>
        </div>
      </nav>
    </header>
    <main>
        <?php require 'controllers/' . $route . '_controller.php'; ?>
    </main>

    <footer>
    <!--     <a href="?page=homepage">About</a>
        <a href="?page=homepage">Blog</a>
        <a href="?page=homepage">Jobs</a>
        <a href="?page=homepage">Press</a>
        <a href="?page=homepage">Accessibility</a>
        <a href="?page=homepage">Partners</a> -->

    </footer>







