function checker(event){
  var charCode = (typeof event.which == "undefined") ? event.keyCode : event.which;
  var charStr = String.fromCharCode(charCode);
  if (charStr == "+") event.preventDefault();
  if (!charStr.match(/^[0-9]$/))
    event.preventDefault();
};
let productType = document.querySelector("#productType");
if (productType)
{
	$("#productType").change(() => {
		if (productType.selectedIndex != 0){
			let i = 0;
			let found = "";
			productType.querySelectorAll("option").forEach(option => {
				if (i == productType.selectedIndex){
					found = option;
					i++;
				}else{
					i++;
				}
			});
			if (found != "")
			{
				let productID = found.value;
				document.querySelector("#product_form").querySelectorAll(".mb-3").forEach(opt => {
					if (opt.classList.contains("touch")) return;
					opt.querySelectorAll("input").forEach(inp => {
						inp.value = "";
						inp.removeAttribute("required");
					});
					if (opt.classList.contains(productID)){
						opt.querySelectorAll("input").forEach(inp => {
							inp.value = "";
							inp.removeAttribute("disabled");
							inp.setAttribute("required", true);
						});
						return;
					}else{
						if (opt.classList.contains("active")){
							opt.classList.remove("active");
							opt.classList.add("hide");
							opt.querySelectorAll("input").forEach(inp => {
								inp.setAttribute("disabled", true);
								inp.removeAttribute("required");
								inp.value = "";
							});
						}
					}
				});
				document.querySelector("#product_form").querySelector(".mb-3." + productID).classList.remove("hide");
				document.querySelector("#product_form").querySelector(".mb-3." + productID).classList.add("active");
			}
		}
	});
}
let save        = document.querySelector(".btn-success"),
	productForm = document.querySelector("#product_form");
if (save){
	if (save.textContent == "Save"){
		// OK
		save.onclick = () => {
			if (productForm.checkValidity()){
				productForm.submit();
			}else{
				console.log("NO!");
			}
		};
	}else{
		// NOT OK
	}
}