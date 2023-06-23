<nav id="navbar">
    <div id="logoNavbar">
        <img src="./images/logo.png" alt="nepalGovImg">
        <div id="logoInfoNavbar">
            <p>नेपाल सरकारको</p>
            <p class="emphasisText">गृह सेवा अन्तर्गत कार्यक्रम</p>
        </div>
        <img src="./images/WavingFlag.gif" alt="nepalFlag">
    </div>
    
    <div id="topicNavbar">
        <ul>
            <li> <a href="index.php">हाम्रो बारे</a></li>
            <li> <a href="#information">सुचना लिनु</a></li>         
                
            <?php if($User->Is_loggedin()): ?>
                <li> <a href="appointment.php">नियुक्ति लिनु</a></li>
                <li> <a href="complain.php">गुनासो गर्नु</a></li>
                <li>
                    <a href="user.php" class="btnLink">
                        <img src="./images/people.png" alt="people" class="invertImg">
                    </a>
                </li>
            <?php else: ?>
                <li>
                    <img src="./images/people.png" alt="people" class="invertImg">
                    <a href="login.php" class="btnLink">लग - इन</a>
                </li>
            <?php endif ?>

        </ul>
    </div>
</nav>