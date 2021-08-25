@extends('layouts.app')




@section('scripts')


<script>
function getData() {
    document.getElementById("top_box").style.display = "none";
    document.getElementById("c_button").style.display = "none";
    document.getElementById("backbutton1").style.display = "none";
    document.getElementById("back").style.display = "block";
    document.getElementById("thee_data").style.display = "block";

}
</script>
<script>
getinfo = async () => {
    var API_KEY = '44bad42c863c717dd4e6ae71efb182ab1009';
    const api_call = await fetch(
        `https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&retmax=20&term=bladder+cancer+herb+plant&api_key=44bad42c863c717dd4e6ae71efb182ab1009&usehistory=y`
    );
    const data = await api_call.text();
    if (data) {
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(data, "text/xml");
        const Web_Env = xmlDoc.getElementsByTagName("WebEnv")[0].childNodes[0].nodeValue;
        const Query_Key = xmlDoc.getElementsByTagName("QueryKey")[0].childNodes[0].nodeValue;
        const api_callb = await fetch(
            `https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&retmax=20&api_key=${API_KEY}&retmode=json&rettype=abstract&query_key=${Query_Key}&WebEnv=${Web_Env}`
        );
        const datab = await api_callb.text();
        
        
        var Today = () => {
        var d = new Date();
        return d.toDateString();
         }

         const theetitle = "Peer-Reviewed Data From the National Center For Biotechnology Information(NCBI)<br> "+ Today() +"<br>"
        var boldtitle =  theetitle.bold();
        var boldtitle= boldtitle
        document.getElementById("thee_data").innerHTML = (boldtitle) + (datab);
    }
}
getinfo();
</script>


@endsection

@section('content')
<div class="container">
            <div id="top_box" >
                <div ><img class="cancerimg" src="img/bladder.jpg"></div>
            </div>
    
        <div class="cancer_info">
                <div class="c_title" >
                    <b>Bladder Cancer</b>
               </div>
                <div >This year, an estimated 81,190 adults (62,380 men and 18,810 women)
                    in
                    the
                    United States will be
                    diagnosed with bladder cancer. Among men, bladder cancer is the fourth most common
                    cancer.
                </div>
            
       
    
        <div id='bottom_box'>
                <div id='back'>
                    <a href="/"><button>
                            <div> BACK</div>
                        </button></a>
                </div>

                <div  id="thee_data">
                    <!-- api info will appear here-->
                </div>
                <div >
            <button id="c_button" class= "cancer_data" onClick="getData()" >
                <div>GET THE DATA!</div>
            </button><br>

            <a id="backbutton1"  href="/">
                    <div>GO BACK</div>
               </a>
        </div>
     
</div>

</div>

     
    

        

        @endsection