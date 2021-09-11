<?php
$id = $_SESSION['UserID'];

echo "<nav class='navbar navbar-expand-lg navbar-light bg-white mb-3' >
            <a class='navbar-brand' href='index.php' style='color: #666666; font-weight: 900; font-size: 32px;'>
            <i class='fa fa-2x fa-podcast' aria-hidden='true'></i> Poddcast</a>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target=''#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
    
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav m-auto text-center'>
                    <li class='nav-item'>
                        <a class='nav-link' href='index.php'>
                            <i class='fa fa-2x fa-home' aria-hidden='true'></i><br>
                            Home </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='profile.php?id=$id'>
                            <i class='fa fa-2x fa-user' aria-hidden='true'></i><br>
                            My Profile</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='People.php'>
                            <i class='fa fa-2x fa-users' aria-hidden='true'></i><br>
                            People</a>
                    </li>
                </ul>
                <ul class='nav navbar-nav navbar-right text-center'>
                    <li class='nav-item'>
                        <a class='nav-link' href='about.php' title='About Us'>
                            <h3><i class='fa fa-info-circle' aria-hidden='true'></i></h3></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='contact.php' title='Contact Us'>
                            <h3><i class='fa fa-question-circle' aria-hidden='true'></i></h3></a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='logout.php' title='Log Out'>
                            <h3><i class='fa fa-sign-out' aria-hidden='true'></i></h3></a>
                    </li>
                </ul>
                <form class='form-inline my-2 my-lg-0' >
                    <input class='form-control mr-sm-2'  style='border-radius: 150px' type='search' placeholder='Search' aria-label='Search'>
                    <button class='btn btn-outline-info my-2 my-sm-0'  style='border-radius: 150px' type='submit'>
                        <i class='fa fa-search' aria-hidden='true'></i>
                    </button>
                </form>
            </div>
        </nav>";

?>


