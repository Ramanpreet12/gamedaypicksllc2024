@extends('front.layout.app')
@section('content')
    <!-- mainheader -->
    <section id="matchResult">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Match Result</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="seasonWeek d-flex">
                        <h5>Season :2023</h5>
                        <span>week 1 of 18 </span>

                    </div>
                </div>
            </div>
            <div id="matchResultSection">
                <div class="container">
                    <div class="matchDetail">
                        <div class="row">
        
                            <div class="col-md-5">
                                <div class="teamResult">
                                    <div class="teamInfo">
                                        <div class="result-content">
                                            <h4><span>FC DRAGONS</span></h4>
                                            <p class="loseResult">WIN</p>
                                        </div>
                                    </div>
                                    <div class="resultteamLogo">
                                        <img src="{{ asset('front/img/LA-Rams.png') }}" alt=""
                                            class="img-fluid teamlogoImg">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="result-count">
                                    <div class="count_number">
                                        <span class="win-Team">
                                            38
                                        </span>
                                        <span>-</span>
                                        <span class="lose-Team">
                                            12
                                        </span>
                                    </div>
                                    <p>May 16,2015 15:30PM
                                        WBEYSLEY STADIUM (LONDON)</p>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="teamResult resultDetail">
        
                                    <div class="resultteamLogo">
                                        <img src="{{ asset('front/img/Lions.png') }}" alt=""
                                            class="img-fluid teamlogoImg">
                                    </div>
                                    <div class="teamInfo">
                                        <div class="result-content">
                                            <h4><span>FC ZULU NINJAS</span></h4>
                                            <p class="loseResult">LOSE</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        
        
                </div>
            </div>
        
        
        </div>
    </section>





    <!-- <style>
                .matchDetail{
                    background-color: #e2e1e1;
                    padding: 20px;
                    margin-bottom:40px;
                }
    .teamResult{
        display:flex;
        background-image: url(https://nfl.kloudexpert.com/front/img/resultBoard.png-11.png);
        background-size:  83% 100%;
        background-repeat: no-repeat;
        background-position: top left;
        justify-content: space-between;
        margin-bottom: 40px;
    }
    .resultDetail{
        background-image: url(https://nfl.kloudexpert.com/front/img/resultBoard.png);
        background-size:  83% 100%;
        background-position: top right;
    }
    .teamInfo {
        padding: 15px 40px 15px 44px;
        text-align: right;
        min-height: 163px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1 0 0;
    }
    .resultDetail .teamInfo {
        padding: 26px 26px 38px 40px;
        text-align: left;
    }

    .teamInfo .loseResult{
        color: #da9a29;
        text-transform: uppercase;
        font-weight: 700;
        margin-bottom: 0;
    }

    .teamInfo .finalNumber{
        font-size: 16px;
        color: rgba(255, 255, 255, 0.7)
    }
    .teamInfo h4{
        margin-bottom:10px;
    }
    .teamInfo h4 span{
        color: rgba(255, 255, 255, 0.7);
        position: relative;
        margin-bottom:10px;
    }
    .teamInfo h4 span:after{
        position: absolute;
        content: '';
        width: 50%;
        right:0;
        height: 3px;
        background-color: #da9a29;
        top: 100%;
    }
    .resultDetail .teamInfo h4 span:after{
        left:0;
    }
    .resultteamLogo {
        position: relative;
        flex: 0 0 170px;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 163px;
    }

    .resultteamLogo:before {
        background-image: url(https://nfl.kloudexpert.com/front/img/resultlogo.png);
        background-size: 100%;
        background-repeat: no-repeat;
        background-position: top left;
        padding: 40px;
        content: "";
        left: -20px;
        position: absolute;
        top: -20px;
        /* width: 100%; */
        right: -20px;
        z-index: -1;
        bottom: -69px;
    }

    .teamlogoImg{
        width:100px;
    }
    .count_number{
        display:flex;
    font-size: 90px;
        color: #06083b;
        font-weight: 700;
        padding: 0 5px;
        line-height:90px;
        justify-content:center;
        margin-bottom:30px
    }
    .result-count{
        text-align: center;
    }




    @media only screen and (min-width: 320px) and (max-width: 767px) {
        .teamInfo {
            padding: 15px 21px 15px 40px;
            justify-content: left;
            min-height: inherit;
        }
        .resultteamLogo {
            flex: 0 0 100px;
            min-height: inherit;
        padding: 0 15px;
        }
        .resultteamLogo:before{
            display:none;
        }
        .teamResult {
        background-size: 100% 100%;
        margin-bottom: 15px;
        max-width: 400px;
        margin-left: auto;
        margin-right: auto;
        }
        .resultDetail .teamInfo {
        padding: 15px 14px 15px 21px;
    }
     
    .count_number {
        font-size: 56px;
        margin-bottom: 12px;
        line-height: 56px;
    }
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
    .count_number {
        font-size: 50px;
        line-height: 50px;
    }
    .teamResult {
        background-size: 100% 100%;
    }
    .teamInfo {
        padding: 15px 0px 15px 20px;
        justify-content:right;
    }
    .resultteamLogo {
            flex: 0 0 80px;
        padding: 0 15px;
        }
        .resultDetail .teamInfo {
        padding: 13px 20px 0px 0px;
    }
    .resultteamLogo:before{
            display:none;
        }
    }
    @media only screen and (min-width: 991px) and (max-width: 1199px) {
        .resultteamLogo:before{
            display:none;
        }
        .teamResult {
        background-size: 100% 100%;
    }
    .teamInfo {
        padding: 15px 0px 15px 40px;
        justify-content:right;
    }

    .resultDetail .teamInfo {
        padding: 26px 71px 38px 0px;
    }
    .resultteamLogo {
            flex: 0 0 100px;
        padding: 0 15px;
        }



    }

            </style> -->

@endsection
