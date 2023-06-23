<?php require("php/Classes.php") ?>


<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if($_POST["Action"] == "TakeAppointment")
    {
        if($_POST["Service"]=="birth" || $_POST["Service"]=="marriage"){$Department_id=1;}
        else if($_POST["Service"]=="watersupply"){$Department_id=3;}
        else if($_POST["Service"]=="electricity"){$Department_id=2;}
        else{header("Location:".$_SERVER["PHP_SELF"]."?msg=Error+Appointing"); die();}

        if(!$User->Appointment($_POST["Service"],$_POST["Date"],$_POST["Time"],$_POST["Location"],$_SESSION["User_id"],$Department_id))
        {
            header("Location:".$_SERVER["PHP_SELF"]."?msg=Error+Appointing"); die();
        }
        else
        {
            header("Location:".$_SERVER["PHP_SELF"]."?msg=Appointed+sucessfully");die();
        }
    }


	unset($_POST);
	header("Location:".$_SERVER["PHP_SELF"]);
	die();
}

if(isset($_GET["msg"])){echo htmlentities($_GET["msg"]);}
  


?>


<?php require("Component/header.php") ?>
<?php require("Component/navigation.php") ?>
    
<main id="main">
    <div id="mainAppointment">
        <p class="topicText">नियुक्ति लिनुहोस</p>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="mainAppointmentForm">
                <input type="hidden" name="Action" value="TakeAppointment">
                <p class="topicTxt">हाम्रा सेवाहरू:</p>
                <div id="mainAppointmentFormDiv">
                    <div id="mainAppointmentFormDivImage">
                        <label for="marriage">
                            <img src="./images/marriage1.png" alt="marriage">
                            <span>विवाह दर्ता</span> 
                        </label><br>
                        <input type="radio" id="marriage" name="Service" value="marriage" required>
                    </div>
                    <div id="mainAppointmentFormDivImage">
                        <label for="birth">
                            <img src="./images/birth1.png" alt="birth">
                            <span>जन्म  दर्ता</span> 
                        </label><br>
                        <input type="radio" id="birth" name="Service" value="birth" required>
                    </div>
                    <div id="mainAppointmentFormDivImage">
                        <label for="watersupply">
                            <img src="./images/watersupply1.png" alt="watersupply">
                            <span>पानी जोडान</span> 
                        </label><br>
                        <input type="radio" id="watersupply" name="Service" value="watersupply" required>
                    </div>
                    <div id="mainAppointmentFormDivImage">
                        <label for="electricity">
                            <img src="./images/electricity1.png" alt="electricity">
                            <span>बिजुली जोडान</span> 
                        </label><br>
                        <input type="radio" id="electricity" name="Service" value="electricity" required>
                    </div>
                </div>
                

                <p class="topicTxt">मिति छान्नुहोस्:</p> 
                <div id="mainAppointmentFormDiv">
                    <input id="datefield" name="Date" type='date' min='1899-01-01' max='2000-13-13' required>
                </div>


                <p class="topicTxt">समय छान्नुहोस्:</p>
                <div id="mainAppointmentFormDiv">
                    <div>
                        <input type="radio" id="seven" name="Time" value="7" required>
                        <label for="seven">0७:00 am</label>
                    </div>
                    <div>
                    <input type="radio" id="eight" name="Time" value="8" required>
                    <label for="eight">0८:00 am</label>
                    </div>
                    <div>
                        <input type="radio" id="nine" name="Time" value="9" required>
                        <label for="nine">0९:00 am</label>
                    </div>
                    <div>
                        <input type="radio" id="sixpm" name="Time" value="18" required>
                        <label for="sixpm">0६:00 pm</label>
                    </div>
                    <div>
                        <input type="radio" id="sevenpm" name="Time" value="19" required>
                        <label for="sevenpm">0७:00 pm</label>
                    </div>
                    <div>
                        <input type="radio" id="eightpm" name="Time" value="20" required>
                        <label for="eightpm">0८:00 pm</label>
                    </div>
                </div>

                <p class="topicTxt">ठेगाना:</p>
                <div id="mainAppointmentFormDiv">
                    <input type="text" name="Location" placeholder="यहाँ आफ्नो ठेगाना लेख्नुहोस्।" class="addressInput" required>
                </div>
                
                <button type="submit" class="formBtn"> पठाउनुहोस् </button>
            </form>
    </div>
    <div>
        <!-- image crousel  -->
    </div>
</main>

<?php require("Component/footer.php") ?>
<?php require("Component/bottom.php") ?>