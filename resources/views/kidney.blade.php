@extends('layouts.app')

@section('scripts')
<script>
    const getInfo = async () => {
        const API_KEY = '{{ env('API_KEY') }}';
        const displayElement = document.getElementById("thee_data");
        const parser = new DOMParser();

        try {
            // API Call 1: Fetch QueryKey and WebEnv
            const apiUrl1 = `https://eutils.ncbi.nlm.nih.gov/entrez/eutils/esearch.fcgi?db=pubmed&retmax=20&term=plant+cancer+kidney+herb+NOT+id=33634751&api_key=${API_KEY}&usehistory=y`;
            const response1 = await fetch(apiUrl1);
            const xmlData1 = await response1.text();
            const xmlDoc1 = parser.parseFromString(xmlData1, "text/xml");

            const WebEnv = xmlDoc1.querySelector("WebEnv")?.textContent;
            const QueryKey = xmlDoc1.querySelector("QueryKey")?.textContent;

            if (!WebEnv || !QueryKey) {
                throw new Error("Unable to retrieve QueryKey or WebEnv");
            }

            // API Call 2: Fetch Article Abstracts
            const apiUrl2 = `https://eutils.ncbi.nlm.nih.gov/entrez/eutils/efetch.fcgi?db=pubmed&retmax=20&api_key=${API_KEY}&retmode=xml&rettype=abstract&query_key=${QueryKey}&WebEnv=${WebEnv}`;
            const response2 = await fetch(apiUrl2);
            const xmlData2 = await response2.text();
            const xmlDoc2 = parser.parseFromString(xmlData2, "text/xml");
            const articles = xmlDoc2.querySelectorAll("PubmedArticle");

            // Process Articles
            const today = new Date().toDateString();
            let content = `<strong>Peer-Reviewed Data From the National Center For Biotechnology Information (NCBI)</strong><br>${today}<br>`;

            articles.forEach(article => {
                const title = article.querySelector("ArticleTitle")?.textContent || "No Title Available";
                const abstract = article.querySelector("AbstractText")?.textContent || "No Abstract Available";
                const pubDate = article.querySelector("PubDate")?.textContent || "Unknown Date";
                const author = article.querySelector("Author > LastName")?.textContent || "Unknown Author";

                content += `
                    <div class="article-item">
                        <h3 class="article-title">${title}</h3>
                        <p><strong>Publication Date:</strong> ${pubDate}</p>
                        <p><strong>First Author:</strong> ${author}</p>
                        <p>${abstract}</p>
                    </div><hr>`;
            });

            displayElement.innerHTML = content;
        } catch (error) {
            console.error("Error:", error);
            displayElement.innerHTML = "<p>There was an error fetching the data. Please try again later.</p>";
        }
    };

    document.getElementById("c_button").addEventListener("click", () => {
        document.getElementById("top_box").style.display = "none";
        document.getElementById("c_button").style.display = "none";
        getInfo();
    });
</script>
@endsection

@section('content')
<div class="container">
    <div id="top_box">
        <img class="cancerimg" src="img/kidneys.jpg" alt="Kidney Cancer Image">
    </div>

    <div class="cancer_info">
        <div class="c_title"><b>Kidney Cancer</b></div>
        <p>Kidney cancer is among the 10 most common cancers in both men and women...</p>
    </div>

    <div id="bottom_box">
        <div id="thee_data"></div>
        <button id="c_button" class="cancer_data">GET THE DATA!</button>
    </div>
</div>
@endsection
