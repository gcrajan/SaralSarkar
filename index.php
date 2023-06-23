<?php require("php/Classes.php") ?>


<?php require("Component/header.php") ?>
<?php require("Component/navigation.php") ?>

<main id="main">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img src="./images/work1.webp">
                <p class="imageCrousalPara">फोहोर व्यवस्थापन</p>
            </div>
              <div class="swiper-slide">
                <img src="./images/work2.jpg">
                <p class="imageCrousalPara">सडक निर्माण</p>
            </div>
              <div class="swiper-slide">
                <img src="./images/work3.jpg">
                <p class="imageCrousalPara">उद्घाटन</p>
            </div>
              <div class="swiper-slide">
                <img src="./images/work4.jpg">
                <p class="imageCrousalPara">त्रिपुरेश्वर पार्क</p>
            </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div id="homeInfo">
            <div id="aboutUS">
                <p class="topicText">हाम्रो बारे</p>
                <p class="aboutUsPara"> हाम्रो वेबसाइटमा स्वागत छ, अपोइन्टमेन्टहरू बुक गर्न र गुनासोहरू समाधान गर्नको लागि एक सुविधाजनक प्लेटफर्म। प्रयोगकर्ता-अनुकूल इन्टरफेसको साथ, तपाईं सजिलैसँग विभिन्न उद्योगहरूका पेशेवरहरूसँग भेट्न र सुरक्षित गर्न सक्नुहुन्छ। </p>
                <p class="aboutUsPara">
                 केवल स्थान, विशेषता, र उपलब्धता द्वारा खोजी गर्नुहोस्, र केहि क्लिकहरूमा बुक गर्नुहोस्। थप रूपमा, हाम्रो उजुरी समाधान प्रणालीले तपाईंलाई प्रतिक्रिया वा गुनासोहरू सीधा सेवा प्रदायकहरूलाई पेश गर्न सक्षम बनाउँछ, तुरुन्त ध्यान र कार्य सुनिश्चित गर्दै। हाम्रो समर्पित ग्राहक समर्थन टोली तपाईलाई सम्पूर्ण प्रक्रियामा सहयोग गर्न सधैं उपलब्ध छ। आज हाम्रो समुदायमा सामेल हुनुहोस् र झन्झट-रहित अपोइन्टमेन्ट समयतालिका र कुशल उजुरी समाधानको अनुभव गर्नुहोस्। </p>
            </div>
            <div id="information">
                <p class="topicText">सुचना</p>
                <div class="informationSidebar">
                    <img src="./images/electricity1.png" alt="electricity" class="informationSidebarImg">
                    <p>त्रिपुरेश्वरमा नयाँ लाइन बिछ्याउने काम...</p>
                    <a href="" class="linkBtn">थप हर्नुहोस</a>
                </div>
                <div class="informationSidebar">
                    <img src="./images/watersupply.jpg" alt="watersupply" class="informationSidebarImg">
                    <p>चुहावटका कारण त्रिपुरुस्वर...</p>
                    <a href="" class="linkBtn">थप हर्नुहोस</a>
                </div>
                <div class="informationSidebar">
                    <img src="./images/street.jpg" alt="street" class="informationSidebarImg">
                    <p>सडक प्रकाशले मानिसहरूलाई...</p>
                    <a href="" class="linkBtn">थप हर्नुहोस</a>
                </div>
            </div>
        </div>
        <div id="officerInfo">
            <p class="topicText">पदाधिकारी/कर्मचारी</p>
            <div class="officerInfoDiv">
                <div class="officerDetail">
                    <img src="./images/office1.jpg">
                    <div class="officerDetailInfo">
                        <h3>चोक राज दवाडी</h3>
                        <p>"अध्यक्ष"</p>
                    </div>
                </div>
                <div class="officerDetail">
                    <img src="./images/office2.jpg">
                    <div class="officerDetailInfo">
                        <h3>परवेश ढुंगाना</h3>
                        <p>"उपाध्यक्ष"</p>
                    </div>
                </div>
                <div class="officerDetail">
                    <img src="./images/office3.jpg">
                    <div class="officerDetailInfo">
                        <h3>सुजन खड्का</h3>
                        <p>"कोषाध्यक्ष"</p>
                    </div>
                </div>
                <div class="officerDetail">
                    <img src="./images/office4.jpg">
                    <div class="officerDetailInfo">
                        <h3>सुमित गुप्ता</h3>
                        <p>"सचिव"</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="ourServices">
            <p class="topicText">हाम्रा सेवाहरू</p>
            <div style="display: flex; justify-content: space-around; margin: 2rem 0rem;">
                <div style="position: relative;">
                    <a href="appointment.php">
                        <img src="./images/appointment.png" style="height:18rem; width:18rem; object-fit:cover;">
                        <span style="    text-decoration: none;
                        position: absolute;
                        top: 0%;
                        left: 25%;
                        font-size: 1.5rem;
                        font-weight: 600;
                        color: black;">नियुक्ति लिनु</span> 
                    </a>
                </div>
                <div style="position: relative;">
                    <a href="complain.php">
                        <img src="./images/complain.jpg" style="height:18rem; width:18rem; object-fit:cover;">
                    <span style="    text-decoration: none;
                    position: absolute;
                    top: 0%;
                    left: 25%;
                    font-size: 1.5rem;
                    font-weight: 600;
                    color: black;">गुनासो गर्नु</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
<?php require("Component/footer.php") ?>
<?php require("Component/bottom.php") ?>