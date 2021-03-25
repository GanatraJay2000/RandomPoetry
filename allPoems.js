
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

	let results = await api("author", "");
	results = Object.values(results)[0];
	
	const authorClicked = async (key) => {
		window.scrollTo(0,0);
		var oldActive = document.querySelector("#authorsList .active");
		oldActive.classList.remove("active");
		var newActive = document.getElementById("author_" + key);
		newActive.classList.add("active");

		var author = results[key];
		author = encodeURIComponent((author).trim());
		var poems = await api("author", author);
		poems = Object.values(poems);
		console.log(poems);
		

		const titleClicked = async (index) => {
			window.scrollTo(0, 0);
			var oldActive = document.querySelector("#titlesList .active");
			oldActive.classList.remove("active");
			var newActive = document.getElementById("title_" + index);
			newActive.classList.add("active");

			var poemContainer = document.getElementById("poemContainer");
			poemContainer.innerHTML = "";
			

			var poemTitle = document.createElement("h4");			
			poemTitle.id = "poemTitle_" + index;
			poemTitle.className += " p-0"
			poemTitle.innerHTML = poems[index].title;
			poemContainer.appendChild(poemTitle);
			
			var poemAuthor = document.createElement("p");
			poemAuthor.innerHTML = poems[index].author;
			poemAuthor.style="color:#b2bbc3"
			// poemAuthor.className+=" mb-5"
			poemContainer.appendChild(poemAuthor);
			
			var poem = document.createElement("ul");
			poem.id = "poem_" + index;
			poem.className+=" p-0"
			poemContainer.appendChild(poem);

			var lines = poems[index].lines;
			lines.forEach((lineValue, count) => {
				var line = document.createElement("li");								
				line.id = "line_" + count;
				line.style.listStyle = "none";
				line.className += " mb-2"
				line.innerHTML = lineValue;

				poem.appendChild(line);
			})

		}





		var titlesList = document.getElementById("titlesList");
		titlesList.innerHTML = "";

		poems.forEach((poem, index) => {
			var name = poem.title;
			var classes = " list-group-item list-group-item-action";
			if (index === 0) {
				classes += " active";
			}
			var title = document.createElement("button");
			title.type = "button";
			title.className += classes;
			title.id = "title_" + index;
			title.innerHTML = name;
			title.onclick = () => { titleClicked(index) }

			titlesList.appendChild(title);
		});
		titleClicked(0);




	}

	
	

	var authorsList = document.getElementById("authorsList");

	results.forEach((result, key) => {
		var classes = " list-group-item list-group-item-action";
		if (key === 0) {
			classes += " active";
		}
		var author = document.createElement("button");
		author.type = "button";
		author.className += classes;
		author.id = "author_" + key;
		author.innerHTML = result;
		author.onclick = () => { authorClicked(key) }

		authorsList.appendChild(author);
	});
	authorClicked(0);



};

main()