const api = (endpoint, value) => {
	var url = "https://poetrydb.org/";
	if (value === "") {
		url += endpoint;
	} else {
		url += endpoint + "/" + value;
	}
	const response = fetch(url).then((response) => response.json());
	return response;
}


const main = async () => {

	let poems = await api("random", "");
    poems = Object.values(poems)[0];
    console.log(poems);

    var poemContainer = document.getElementById("poemContainer");
    poemContainer.innerHTML = "";

    var headingContainer = document.createElement("div");    
    headingContainer.className += " mb-5 d-flex justify-content-between";
    poemContainer.appendChild(headingContainer);
    
   
    
    var heading = document.createElement("div");
    // heading.className+=" mb-5"
    headingContainer.appendChild(heading);
    
    var poemTitle = document.createElement("h4");
    poemTitle.innerHTML = poems.title;
    poemTitle.className+=" mb-1"
    heading.appendChild(poemTitle);
    
    var poemAuthor = document.createElement("p");
    poemAuthor.innerHTML = poems.author;
    poemAuthor.style="color:#b2bbc3"
    // poemAuthor.className+=" mb-5"
    heading.appendChild(poemAuthor);



    var poem = document.createElement("ul");			
    poem.id = "poem";
    poem.className+=" p-0"
    poemContainer.appendChild(poem);

    var lines = poems.lines;
    lines.forEach((lineValue, count) => {
        var line = document.createElement("li");								
        line.id = "line_" + count;
        line.style.listStyle = "none";
        line.className += " mb-2"
        line.innerHTML = lineValue;

        poem.appendChild(line);
    })


    var savePoem = document.createElement("form");    
    savePoem.action = "save.php";
    savePoem.method = "POST";
    headingContainer.appendChild(savePoem);
    
    var input = document.createElement("input");
    input.value = JSON.stringify(poems);
    input.name = "poem";
    input.type = "hidden";
    savePoem.appendChild(input);
    
    var button = document.createElement("button");
    button.innerHTML = "♡";
    button.className += " btn btn-outline-dark";
    button.type = "submit";
    savePoem.appendChild(button);

    
		

};

main()