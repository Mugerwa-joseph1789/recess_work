<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Services</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    font-family: "montserrat",sans-serif;
    box-sizing: border-box;

    }
.services-section{
    padding: 60px 0;

}
.inner-width{
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 0 20px;
    overflow: hidden;
}
.section-title{
    text-align: center;
    color: #ffffff;
    text-transform: uppercase;
    font-size: 30px;

}
.border{
    width: 160px;
    height: 2px;
    background: #ffffff;
    margin: 40px auto;
}
.services-container{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;


}
.service-box{
    max-width: 33.33%;
    padding: 10px;
    text-align: center;
    color: #ffffff;
    cursor: pointer;
}
.service-icon{
    display: inline-block;
    width: 70px;
    height: 70px;
    border: 3px solid #ffffff;
    color: #ffffff;
    transform: rotate(45deg);
    margin-bottom: 30px;
    margin-top: 16px;
    transition: 0.3s linear;
}
.services-icon i{
    line-height: 70px;
    transform: rotate(-45deg);
    font-size: 26px;
}
.service-box:hover .service-icon{
    background: #ffffff;
    color: #ffffff;

}
.service-title{
    font-size: 18px;
    text-transform: uppercase;
    margin-bottom: 10px;
    color: #ffffff;

}
.service-desc{
    font-sixe: 16px;
    color: #ffffff;
}
@media screen and(max-width:960px){
    .service-box{
        max-width: 45%;
    }
}
@media screen and(max-width:760px){
    .service-box{
        max-width: 50%;
    }
}
@media screen and(max-width:480px){
    .service-box{
        max-width: 100%;
    }
}
</style>
<body>
<div style="background-image:url({{asset('/images/covid.png')}});height:100vh">
<div><a href="/" style="color: #ffffff; font-size: 27px">Home</a></div>
    <div class="services-section">
        <div class="inner-width">
            <h1 class="section-title">Our Services</h1>
            <div class="border"></div>
            <div class="services-container">
                
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <div class="service-title">making referrals</div>
                    <div class="service-description">
                    Once a suspected Covid-19 case is confirmed to be positive, we will refer them to different hospitals in their regions and we also register the health-officer to differnet hospitals in the country.
                    </div>
                </div>
                <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <div class="service-title">promotions</div>
                    <div class="service-description">
                   Once a Health-Officer meets certain conditons,the  Health-Officers will be promoted to other classes of Hospitals forexample from a General hospital to a Regional Refeeral hospital
                    </div>
                </div>
                 <div class="service-box">
                    <div class="service-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <div class="service-title">paymentss</div>
                    <div class="service-description">
                    We will ensure that each and every Health-Officer in the different hospitals in the country will be awarded with payments.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>