
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
        var API_KEY = '{{ env('API_KEY') }}';
        
        try {
            // First API call: Get WebEnv and QueryKey
            const api_call = await fetch(
                `https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&retmax=20&term=plant+cancer+non+hodgkin+lymphoma+herb&api_key=${API_KEY}&usehistory=y`
            );
            const data = await api_call.text();
            console.log(data); // Debug raw XML response
    
            const parser = new DOMParser();
            const xmlDoc = parser.parseFromString(data, "text/xml");
    
            const Web_Env_Element = xmlDoc.getElementsByTagName("WebEnv")[0];
            const Query_Key_Element = xmlDoc.getElementsByTagName("QueryKey")[0];
    
            if (!Web_Env_Element || !Query_Key_Element) {
                throw new Error("Missing WebEnv or QueryKey in the API response");
            }
    
            const Web_Env = Web_Env_Element.childNodes[0]?.nodeValue;
            const Query_Key = Query_Key_Element.childNodes[0]?.nodeValue;
    
            // Second API call: Fetch abstracts
            const api_callb = await fetch(
                `https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&retmax=20&api_key=${API_KEY}&retmode=xml&rettype=abstract&query_key=${Query_Key}&WebEnv=${Web_Env}`
            );
            const datab = await api_callb.text();
    
            // Parse the XML response from the second API call
            const xmlDocb = parser.parseFromString(datab, "text/xml");
            const articles = xmlDocb.getElementsByTagName("PubmedArticle");
    
            let formattedArticles = '';
            for (let i = 0; i < articles.length; i++) {
                const article = articles[i];
                const title = article.getElementsByTagName("ArticleTitle")[0]?.textContent || "No Title Available";
                const abstract = article.getElementsByTagName("AbstractText")[0]?.textContent || "No Abstract Available";
                const pubDate = article.getElementsByTagName("PubDate")[0]?.textContent || "Unknown Date";
                
                // Limit authors to only the first one
                const authors = article.getElementsByTagName("Author");
                let authorNames = '';
                if (authors.length > 0) {
                    authorNames = authors[0].getElementsByTagName("LastName")[0]?.textContent + ", " + authors[0].getElementsByTagName("ForeName")[0]?.textContent;
                }
    
                formattedArticles += `<div class="article-item">
                    <h3 class="article-title">${title}</h3>
                    <p class="article-date"><strong>Publication Date:</strong> ${pubDate}</p>
                    <p class="article-authors"><strong>Author:</strong> ${authorNames}</p>
                    <p class="article-abstract">${abstract}</p>
                </div><hr>`;
            }
    
            // Display articles
            const today = new Date().toDateString();
            const header = `<strong>Peer-Reviewed Data From the National Center For Biotechnology Information (NCBI)</strong><br>${today}<br>`;
            document.getElementById("thee_data").innerHTML = header + formattedArticles;
    
        } catch (error) {
            console.error("Error fetching data:", error);
            document.getElementById("thee_data").innerHTML = `<p>There was an error fetching the data. Please try again later.</p>`;
        }
    };
    
    
    // Ensure the function runs when the button is clicked
    getData = () => {
        document.getElementById("top_box").style.display = "none";
        document.getElementById("c_button").style.display = "none";
        document.getElementById("backbutton1").style.display = "none";
        document.getElementById("back").style.display = "block";
        document.getElementById("thee_data").style.display = "block";
        getinfo();
</script>


@endsection

@section('content')
<div class="container">
            <div id="top_box" >
                <div ><img class="cancerimg" src="img/nhLymphoma.jpg"></div>
            </div>
    
        <div class="cancer_info">
                <div class="c_title" >
                    <b>Non-Hodgkins Lymphoma</b>
               </div>
                <div >
Non-Hodgkin's lymphoma is a cancer that starts in white blood cells called lymphocytes, which are part of the body’s immune system. This year, about 19,910 people will die from this cancer (11,510 males and 8,400 females).


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