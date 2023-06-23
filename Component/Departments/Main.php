<div id="info-div-profile-section">
    <div id="title-info-div-profile-section">
        <p onclick="showInformation()" id="info-title-info-div-profile-section">नियुक्ति दिने</p>
        <p onclick="showPost()" id="post-title-info-div-profile-section">गुनासो सुन्नु</p>
    </div>
    <div id="information-info-div-profile-section">
        <?php $Data = $Department->AllAppointments() ?>

        <?php if($Data->num_rows>0): ?>
            <table id="customers">
                <tr>
                    <th>इमेल</th>
                    <th>सेवाहरू</th>
                    <th>मिति</th>
                    <th>समय</th>
                    <th>वर्तमान अवस्था</th>
                    
                </tr>

                <?php while($row = $Data->fetch_assoc()):  ?>
                <tr>
                    <td><?php echo $row["Email"]  ?></td>
                    <td><?php echo $row["Service"]  ?></td>
                    <td><?php echo $row["Date"] ?></td>
                    <td><?php echo $row["Time"]  ?>:00</td>
                    <td>
                        <?php if($row["Is_accepted"] ==="0"): ?>
                            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                                <input type="hidden" name="Action" value="AcceptRejectAppointment">
                                <input type="hidden" name="Appointment_id" value="<?php echo $row["Appointment_id"]?>">
                                <input type="hidden" name="State" value="1">
                                <input type="submit" name="submit" value="स्वीकार" class="allProfileBtn">
                            </form>
                        <?php elseif($row["Is_accepted"] ==="1"): ?>
                            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                                <input type="hidden" name="Action" value="AcceptRejectAppointment">
                                <input type="hidden" name="Appointment_id" value="<?php echo $row["Appointment_id"]?>">
                                <input type="hidden" name="State" value="0">
                                <input type="submit" name="submit" value="अस्वीकार" class="allProfileBtn">
                            </form>
                        <?php else: ?>
                            <form action="<?php echo $_SERVER["PHP_SELF"]?>" style="display:inline;" method="post">
                                <input type="hidden" name="Action" value="AcceptRejectAppointment">
                                <input type="hidden" name="Appointment_id" value="<?php echo $row["Appointment_id"]?>">
                                <input type="hidden" name="State" value="1">
                                <input type="submit" name="submit" value="स्वीकार" class="allProfileBtn">
                            </form>
                            <form action="<?php echo $_SERVER["PHP_SELF"]?>" style="display:inline;"  method="post">
                                <input type="hidden" name="Action" value="AcceptRejectAppointment">
                                <input type="hidden" name="Appointment_id" value="<?php echo $row["Appointment_id"]?>">
                                <input type="hidden" name="State" value="0">
                                <input type="submit" name="submit" value="अस्वीकार" class="allProfileBtn">
                            </form>
                        <?php endif ?>
                    </td>
                </tr>
                <?php  endwhile ?>
            </table>
        <?php else: ?>
            <!-- ------------- when empty -------- -->       
            <article id="empty-mypost-profilePage">
                <a href="appointment.html" style="text-decoration: none;"> <p id="shop-topic">कुनै नियुक्ति छैन।</p></a>
                <img src="./images/appointment.png" alt="appointment" style="height: 40rem;">
            </article>
        <?php endif  ?>
    </div>
    <div id="myPost-info-div-profile-section">
        <?php $Data = $Department->AllComplains() ?>

        <?php if($Data->num_rows>0): ?>
            <article id="shop-items">
                <div id="cart-shop">
                    <div class="item-cart-shop">
                        <?php while($row = $Data->fetch_assoc()): ?>
                            <div class="img-item-cart-shop" <?php if($row["Is_read"]==="1"):?>style="border:2px solid green; box-shadow: 5px 5px green;"<?php endif ?>>
                                <!-- database bata import garne complain topic and complain  -->
                                <p><?php echo $row["Email"]  ?></p>
                                <h1><?php echo $row["Title"]  ?></h1>
                                <p><?php echo $row["Description"] ?></p>
                                <div>
                                    <?php if($row["Is_read"]!=="1"):?>
                                        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                                            <input type="hidden" name="Action" value="ReadComplain">
                                            <input type="hidden" name="Complain_id" value="<?php echo $row["Complain_id"]?>">
                                            <input type="submit" value="पढेको" class="allProfileBtn">
                                        </form>
                                    <?php endif ?>
                                </div>
                            </div>
                        <?php endwhile ?>
                    </div>
                </div>
            </article>
        <?php else: ?>

            <!-- ------------- when empty -------- -->   
            <article id="empty-profilePage">
                <p id="shop-topic">गुनासो छैन ।</p>
                <img src="./images/complain.jpg" alt="complain box" style="height: 45rem;">
            </article>
        <?php endif ?>
    </div>
</div>