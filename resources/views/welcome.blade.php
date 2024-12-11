<!DOCTYPE html>
@extends('layouts.app')






@section('script')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

            @endsection

@section('content')
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
                                <a class="dropdown-item" href="/liver">Liver Cancer</a>
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
@endsection

</body>

</html>