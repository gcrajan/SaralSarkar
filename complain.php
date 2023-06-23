<?php require("php/Classes.php") ?>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	if($_POST["Action"] == "Complain" && $_POST["Title"]!="")
    {
        if($_POST["Title"]=="WasteManagement" || $_POST["Title"]=="StreetLighting"){$Department_id=1;}
        else if($_POST["Title"]=="WaterSupply"){$Department_id=3;}
        else if($_POST["Title"]=="ElectricityRelated"){$Department_id=2;}
        else{header("Location:".$_SERVER["PHP_SELF"]."?msg=Error+complaining"); die();}


        if(!$User->Complain($_POST["Title"],$_POST["Description"],$_SESSION["User_id"],$Department_id))
        {header("Location:".$_SERVER["PHP_SELF"]."?msg=Error+complaining"); die();}
    }


	unset($_POST);
	header("Location:".$_SERVER["PHP_SELF"]."?msg=Complain+filed+sucessfully");
	die();
}

if(isset($_GET["msg"])){echo htmlentities($_GET["msg"]);}
  


?>


<?php require("Component/header.php") ?>
<?php require("Component/navigation.php") ?>
    
<main id="main">
    <p class="topicText">गुनासो गर्नुहोस</p>
    <div id="mainComplainDiv">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" id="mainComplainForm">
            <input type="hidden" name="Action" value="Complain">
            <div id="selectComplain">
                <label for="selectComplain">गुनासो छान्नुहोस्:</label>
                <select name="Title" id="selectComplain" required>
                    <option value="">कुनै चयन गर्नुहोस्</option>
                    <option value="WasteManagement">फोहोर व्यवस्थापन</option>
                    <option value="WaterSupply">पानी आपूर्ति व्यवस्थापन</option>
                    <option value="ElectricityRelated">विद्युत प्राधिकरण</option>
                    <option value="StreetLighting">सडकमा प्रकाश</option>
                </select>
            </div>

            <textarea name="Description" id="complain" cols="30" rows="10" placeholder="आफ्नो गुनासो यहाँ लेख्नुहोस्।" required></textarea>

            <button type="submit" class="formBtn"> पठाउनुहोस् </button>

        </form>
        <div class="swiper mySwiper" style="width: 450px;">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="height: 400px; width: 300px;"><img src="./images/problem0.jpg" style="border-bottom:7px solid #229ff9;border-right:7px solid #229ff9;"></div>
                <div class="swiper-slide"  style="height: 400px; width: 300px;"><img src="./images/problem1.jpg" style="border-bottom:7px solid #229ff9;border-right:7px solid #229ff9;"></div>
                <div class="swiper-slide"  style="height: 400px; width: 300px;"><img src="./images/problem2.webp" style="border-bottom:7px solid #229ff9;border-right:7px solid #229ff9;"></div>
                <div class="swiper-slide"  style="height: 400px; width: 300px;"><img src="./images/problem3.jpg" style="border-bottom:7px solid #229ff9;border-right:7px solid #229ff9;"></div>
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>
</main>

<?php require("Component/footer.php") ?>
<?php require("Component/bottom.php") ?>