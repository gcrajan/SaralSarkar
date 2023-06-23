<?php require("php/Classes.php") ?>
<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){$User->Logout();}

if(!$User->Is_loggedin()){header("Location:login.php");die();}


?>

<?php require("Component/header.php") ?>
<?php require("Component/navigation.php") ?>

<section id="profile-section">

    <div id="div-profile-section">
        <!-- <img src="./images/userImg/img.png.jpg"> -->
        <div id="detail-div-profile-section">
            <p>नाम: <span id="detail-info-div-profile-section"><?php echo $_SESSION["Name"] ?></span></p>
            <p>सम्पर्क: <span id="detail-info-div-profile-section"><?php echo $_SESSION["Contact"] ?></span></p>
            <p>इमेल: <span id="detail-info-div-profile-section"><?php echo $_SESSION["Email"] ?></span></p>
            <p>ठेगाना: <span id="detail-info-div-profile-section"><?php echo $_SESSION["Location"] ?></span></p>
            <div id="submitbtn-info-div-profile-section">
                <form action="<?php $_SERVER["PHP_SELF"] ?>" method="POST">
                    <input type="submit" value="लग आउट"  class="allProfileBtn" id="button-submit-info-div-profile-section">
                </form>
                <!-- <form action="">
                    <input type="submit" value="Edit" class="allProfileBtn" id="button-submit-info-div-profile-section">
                </form> -->
            </div>
        </div>
    </div>

    <div id="info-div-profile-section">
        <div id="title-info-div-profile-section">
            <p onclick="showInformation()" id="info-title-info-div-profile-section">नियुक्ति लिनु</p>
            <p onclick="showPost()" id="post-title-info-div-profile-section">गुनासो गर्नु</p>
        </div>
        <div id="information-info-div-profile-section">

            <?php $Data = $User->MyAppointment($_SESSION["User_id"]); ?>

            <?php if($Data->num_rows>0):?>
                <table id="customers">
                    <tr>
                        <th>सेवाहरू</th>
                        <th>मिति</th>
                        <th>समय</th>
                        <th>वर्तमान अवस्था</th>
                    </tr>

                    <?php while($row = $Data->fetch_assoc()): ?>
                   
                        <tr>
                            <td><?php echo $row["Service"]  ?></td>
                            <td><?php echo $row["Date"] ?></td>
                            <td><?php echo $row["Time"]  ?>:00</td>
                            <td>
                                <?php if($row["Is_accepted"]==='1'):  ?>
                                    Accepted
                                <?php elseif($row["Is_accepted"]==='0'):?>
                                    Rejected
                                <?php else:?>
                                    Under Review
                                <?php endif ?>

                            </td>
                        </tr>
                    <?php endwhile ?>
                    
                </table>
            <?php else:  ?>
                <!-- ------------- when empty -------- -->       
                <article id="empty-mypost-profilePage">
                    <a href="appointment.html" style="text-decoration: none;"> <p id="shop-topic">केही अपोइन्टमेन्ट लिनुहोस्।</p></a>
                    <img src="./images/appointment.png" alt="appointment" style="height: 40rem;">
                </article>
            <?php endif ?>
        </div>
        <div id="myPost-info-div-profile-section">
            <?php $Data = $User->MyComplain($_SESSION["User_id"]); ?>

            <?php if($Data->num_rows>0):?>
                <article id="shop-items">
                    <div id="cart-shop">
                        <div class="item-cart-shop">
                            <?php while($row = $Data->fetch_assoc()): ?>
                                <div class="img-item-cart-shop"<?php if($row["Is_read"]==='1'){echo 'style="border:2px solid green; box-shadow: 5px 5px green;"';}  ?> >
                                    <!-- database bata import garne complain topic and complain  -->
                                    <h1><?php echo $row["Title"]  ?></h1>
                                    <p><?php echo $row["Description"] ?></p>
                                </div>
                            <?php endwhile ?>
                        </div>
                    </div>
                </article>
                
            <?php else: ?>
                <!-- ------------- when empty -------- -->  
                <article id="empty-profilePage">
                    <a href="complain.html" style="text-decoration: none;"><p id="shop-topic">तपाईको कुनै गुनासो छ ?</p></a> 
                    <img src="./images/complain.jpg" alt="complain box" style="height: 45rem;">
                </article>
            <?php endif ?>
        </div>
    </div>
</section>
    
<?php require("Component/footer.php") ?>
<?php require("Component/bottom.php") ?>