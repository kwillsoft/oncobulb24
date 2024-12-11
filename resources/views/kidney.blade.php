@extends('layouts.app')




@section('scripts')

<script>
getinfo = async () => {
    var API_KEY = '{{ env('API_KEY') }}';
    
    try {
        // First API call: Get WebEnv and QueryKey
        const api_call = await fetch(
            `https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&retmax=20&term=plant+cancer+kidney+herb+NOT+id=33634751&api_key=${API_KEY}&usehistory=y`
        );
        const data = await api_call.text();
        const parser = new DOMParser();
        const xmlDoc = parser.parseFromString(data, "text/xml");
        const Web_Env = xmlDoc.getElementsByTagName("WebEnv")[0].childNodes[0].nodeValue;
        const Query_Key = xmlDoc.getElementsByTagName("QueryKey")[0].childNodes[0].nodeValue;

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
            
            // Get the first three authors
            const authors = article.getElementsByTagName("Author");
            let authorNames = '';
            for (let j = 0; j < Math.min(authors.length, 3); j++) {
                const lastName = authors[j].getElementsByTagName("LastName")[0]?.textContent;
                const foreName = authors[j].getElementsByTagName("ForeName")[0]?.textContent;
                if (lastName && foreName) {
                    authorNames += `${lastName}, ${foreName}`;
                } else if (lastName) {
                    authorNames += `${lastName}`;
                }
                if (j < 2 && j < authors.length - 1) {
                    authorNames += ", "; // Add comma between authors if not the last author
                }
            }

            // Display articles with the first three authors
            formattedArticles += `<div class="article-item">
                <h3 class="article-title">${title}</h3>
                <p class="article-date"><strong>Publication Date:</strong> ${pubDate}</p>
                <p class="article-authors"><strong>Author(s):</strong> ${authorNames}</p>
                <p class="article-abstract">${abstract}</p>
            </div><hr>`;
        }

        // Display articles header with today's date
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
};

</script>

@endsection

@section('content')
<div class="container">
            <div id="top_box" >
                <div ><img class="cancerimg" src="img/kidneys.jpg"></div>
            </div>
    
        <div class="cancer_info">
                <div class="c_title" >
                    <b>Kidney Cancer</b>
               </div>
                <div >Kidney cancer is among the 10 most common cancers in both men and women. Overall, the lifetime risk for developing kidney cancer in men is about 1 in 48. The lifetime risk for women is 1 in 83.

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