<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <title>oncoBULB | Plant-Based Cancer Research At Your Fingertips</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- Styles -->

    <style>
    body {
        font-family: 'Monserrat', sans-serif;
        background: black;
        color: #ebff93;
    }

    .choose {
        border-radius: 25px;
        color: green;
        border-color: green;
        background: black;
    }
    button,
    button.show,
    .choose:hover,
    .choose:active {
        background-color: black !important;
        border-color: #ebff93 !important;
        box-shadow:none !important;
        color: #ebff93 !important;
        font-weight:100 !important;
        text-transform:uppercase;
        border-width: .3px !important;
    }
    .choose:hover{
        color:lightgreen !important;
    }

    .dropdown-item {
        background: black;
        color: green;

    }
    .dropdown-item:active{
        background: green;
        color: #ebff93;

    }
    .dropdown-menu{
        padding:0 !important;
    }

    .title,
    .blurb {
        font-family: 'Montserrat', thin, sans-serif;
        font-size: 2.5rem;
        color: green;
    }
    .blurb{
        text-transform:uppercase;
    }
    @media only screen and (max-width: 780px) {
            .blurb, .pick, .disclaimer {
        font-size: 1rem !important;  
        padding:28px 0 28px 0;

         }}
         @media only screen and (max-width: 780px) {
           #faq {
        font-size: 2rem !important;  
        

         }}
    a, a:hover{
        color:green;
        text-decoration:none !important;
    }

    .pick {
        font-family: 'Montserrat', thin, sans-serif;
        font-size: 1.5rem;
        color: #ebff93;


    }
#faq{
    margin-top:2.5rem;
    text-decoration:none;
}
    .choose {
        border-radius: 25px;
        margin: 0 auto;
    }

    .disclaimer,
    .signature {
        font-family: 'Montserrat', thin, sans-serif;
        font-size: 1.2rem;
        color: green;
        margin-top: 13%;
    }
    .btn-secondary:not(:disabled):not(.disabled).active, .btn-secondary:not(:disabled):not(.disabled):active, .show>.btn-secondary.dropdown-toggle {
    color: white;
    background-color: black;
    border-color: green;
}
.btn-secondary.focus, .btn-secondary:focus {
    /* color: #fff; */
    /* background-color: #5a6268; */
    /* border-color: #545b62; */
     box-shadow: none;
}

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

</head>

<body class="antialiased ">
    <div class="relative flex items-top justify-center min-h-screen  sm:items-center py-4 sm:pt-0">
    

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div style="text-align:center;">
                <span class=" title container col-6 "><span>oncoBULB</span> <img  class="animate__animated animate__pulse animate__slow"src="img/onclogo.png"></span>
                <div class=" blurb container col-8"> up-to-the minute, peer-reviewed, herbal cancer care research<div>
                        <div class="pick"> Pick
                            a topic below
                            to view summaries of clinical, plant-based cancer studies.* </div>
                    </div>
                    <div class="container ">
                        <div class="dropdown">
                            <button class=" choose btn btn-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" aria-pressed="false">
                                Choose A Cancer Type
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="/bladder">Bladder Cancer</a>
                                <a class="dropdown-item" href="/breast">Breast Cancer</a>
                                <a class="dropdown-item" href="/colorectal">Colorectal Cancer</a>
                                <a class="dropdown-item" href="/endometrial">Endometrial Cancer</a>
                                <a class="dropdown-item" href="/kidney">Kidney Cancer</a>
                                <a class="dropdown-item" href="/leukemia">Leukemia</a>
                                <a class="dropdown-item" href="/lung">Lung Cancer</a>
                                <a class="dropdown-item" href="/melanoma">Melanoma</a>
                                <a class="dropdown-item" href="/nhl">Non-Hodgkins Lymphoma</a>
                                <a class="dropdown-item" href="/pancreatic">Pancreatic Cancer</a>
                                <a class="dropdown-item" href="/prostate">Prostate Cancer</a>
                                <a class="dropdown-item" href="/thyroid">Thyroid Cancer</a>

                            </div>
                        </div>
                    </div>
                    <div id="faq"><a href="/faq">F.A.Q'.S<a></div>

                    <div class="disclaimer">*In accordance with all applicable medical laws, oncoBULB does not claim to
                        treat, cure or diagnose any
                        disease, illness or condition.</div>
                    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                        <div class="text-center text-sm text-gray-500 sm:text-left">
                            <div class="flex items-center">





                            </div>
                        </div>

                        <div class="signature">
                            OncoBULB | A <a href="https://kwillsoftware.com" text_decoration="none">KWILLSOFTWARE </a>project
                        </div>
                    </div>
                </div>
            </div>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


</body>

</html>