window.onload = () => {
	let products = document.querySelector(".products");
	let jq = jQuery.get("/product/get", (data) => {
		products.innerHTML = data;
	});
};
setTimeout(() => {
	let msdelete = document.querySelector("#delete-product-btn"),
	    msbuttns = document.querySelectorAll(".delete-checkbox");
	msbuttns.forEach(btn => {
		btn.onclick = () => {
			btn.parentElement.classList.toggle("active");
		};
	});
	msdelete.onclick = () => {
		let list = [];
		$(".products .card").each((i,product) => {
			if (product.classList.contains("active") || product.querySelector("input[type='checkbox']").checked){
				console.log(product.getAttribute("delID"));
				list.push(product.getAttribute("delID"));
			}
		});
		console.log(list);
		jQuery.post("/product/delete", {dellist: list}, (data) => {
			if (data == "success"){
				window.location.href = `/`;
			}
		});
		console.log(list);
	};
}, 500);