const headerElement = document.querySelector("header")
const footerElement = document.querySelector("footer")

const fetchHeader = async () => {
	try{
		const res = await fetch("Header.txt");
		const template = await res.text();
		headerElement.innerHTML = template;
	}catch (err){
		console.log(err);
	}
};
const fetchFooter = async () =>{
	try{
		const res = await fetch("Footer.txt");//fetch the footer content
		const template = await res.text(); // Get the text from the response
		footerElement.innerHTML = template; //Insert it into the footer element
	}catch (err){
		console.log(err);
	}
};

fetchHeader()	//Call to fetch header
fetchFooter() //Call to fetch footer