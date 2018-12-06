
<script type="text/javascript">
    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    </script>

<style type="text/css">


            progress {

                background-color: #fff;

            }


            /*################# Cards Indicadores #################*/
            .card-professor{

                color: white ;
                border:none; 
                box-shadow: 6px 6px 12px #b1b1b1; 
                opacity:0.9;
                border-radius: 5px;
                position: relative;

            }

            .num-indicador{
                position: absolute;
                bottom: 0%; 
                left:4%; 
                font-size: 550%;


            }

            .nom-indidacor{
                position: absolute; 
                top: 4px;
                left: 4%;
                font-size: 125%;

            }


            .logo-indicador{
                z-index:-1;
                opacity: 0.5; 
                position: absolute; 
                top: 1%;
                right: 2%;

            }

            .linha {

                box-shadow: 2px 4px 6px #b1b1b1; 

            }

            /*############################################################*/

            #graf.progress{
                width: 150px;
                height: 150px;
                line-height: 150px;
                background: none;
                margin: 0 auto;
                box-shadow: none;
                position: relative;
            }

            #graf.progress:after{
                content: "";
                width: 100%;
                height: 100%;
                border-radius: 50%;
                border: 12px solid #fff;
                position: absolute;
                top: 0;
                left: 0;
            }
            #graf.progress > span{
                width: 50%;
                height: 100%;
                overflow: hidden;
                position: absolute;
                top: 0;
                z-index: 1;
            }
            #graf.progress .progress-left{
                left: 0;
            }
            #graf.progress .progress-bar{
                width: 100%;
                height: 100%;
                background: none;
                border-width: 12px;
                border-style: solid;
                position: absolute;
                top: 0;
            }
            #graf.progress .progress-left .progress-bar{
                left: 100%;
                border-top-right-radius: 80px;
                border-bottom-right-radius: 80px;
                border-left: 0;
                -webkit-transform-origin: center left;
                transform-origin: center left;
            }
            #graf.progress .progress-right{
                right: 0;
            }
            #graf.progress .progress-right .progress-bar{
                left: -100%;
                border-top-left-radius: 80px;
                border-bottom-left-radius: 80px;
                border-right: 0;
                -webkit-transform-origin: center right;
                transform-origin: center right;
                animation: loading-1 1.8s linear forwards;
            }
            #graf.progress .progress-value{
                width: 90%;
                height: 90%;
                border-radius: 50%;
                background: #44484b;
                font-size: 24px;
                color: #fff;
                line-height: 135px;
                text-align: center;
                position: absolute;
                top: 5%;
                left: 5%;
            }
            .progress.blue .progress-bar{
                border-color: #6fc8bf;
            }
            .progress.blue .progress-left .progress-bar{
                animation: loading-2 1s linear forwards 1.8s;
            }
            .progress.yellow .progress-bar{
                border-color: #ddde40;
            }
            .progress.yellow .progress-left .progress-bar{
                animation: loading-2 1s linear forwards 1.8s;
            }
            .progress.pink .progress-bar{
                border-color: #ed687c;
            }
            .progress.pink .progress-left .progress-bar{
                animation: loading-4 0.4s linear forwards 1.8s;
            }
            .progress.green .progress-bar{
                border-color: #29c1f1;
            }
            .progress.green .progress-left .progress-bar{
                animation: loading-2 1s linear forwards 1.8s;
            }

            .progress.red .progress-bar{
                border-color: #1E91E0;
            }
            .progress.red .progress-left .progress-bar{
                animation: loading-2 1s linear forwards 1.8s;
            }

            @keyframes loading-1{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(180deg);
                    transform: rotate(180deg);
                }
            }
            @keyframes loading-2{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(145deg);
                    transform: rotate(145deg);
                }
            }
            @keyframes loading-3{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(90deg);
                    transform: rotate(90deg);
                }
            }
            @keyframes loading-4{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(36deg);
                    transform: rotate(36deg);
                }
            }
            @keyframes loading-5{
                0%{
                    -webkit-transform: rotate(0deg);
                    transform: rotate(0deg);
                }
                100%{
                    -webkit-transform: rotate(45deg);
                    transform: rotate(45deg);
                }
            }


    </style>

  </body>

</html>
