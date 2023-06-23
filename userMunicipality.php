<?php require("php/Classes.php") ?>

<?php $Department = new Department($Database_connection,1) ?>
<?php require("Component/Departments/Processes.php")?>


<?php require("Component/header.php") ?>
<?php require("Component/navigation.php") ?>

    <section id="profile-section">

        <div id="div-profile-section">
            <img src="./images/municipality.jpg">
            <div id="detail-div-profile-section">
                <p>नाम: <span id="detail-info-div-profile-section">तुलसीपुर उपमहानगरपालिका</span></p>
                <p>सम्पर्क: <span id="detail-info-div-profile-section">९८0000२00४</span></p>
                <p>इमेल: <span id="detail-info-div-profile-section">coder@gcrajan.com.np</span></p>
                <p>ठेगाना: <span id="detail-info-div-profile-section">तुलसीपुर, नेपाल</span></p>
                <div id="submitbtn-info-div-profile-section">
                    <!-- <form action="">
                        <input type="submit" value="लग आउट"  class="allProfileBtn" id="button-submit-info-div-profile-section">
                    </form> -->
                    <!-- <form action="">
                        <input type="submit" value="Edit" class="allProfileBtn" id="button-submit-info-div-profile-section">
                    </form> -->
                </div>
            </div>
        </div>

        <?php require("Component/Departments/Main.php")?>
    </section>
    
<?php require("Component/footer.php") ?>
<?php require("Component/bottom.php") ?>