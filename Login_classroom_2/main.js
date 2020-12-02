function index(id){
	const comments_page_id = id;
	fetch("comments.php?page_id=" + comments_page_id).then(response => response.text()).then(data => {
		document.querySelector(".comments").innerHTML = data;
		document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
			element.onclick = event => {
				event.preventDefault();
				document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
				document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
				document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "'] input[name='name']").focus();
			};
		});
		document.querySelectorAll(".comments .write_comment form").forEach(element => {
			element.onsubmit = event => {
				event.preventDefault();
				fetch("comments.php?page_id=" + comments_page_id, {
					method: 'POST',
					body: new FormData(element)
				}).then(response => response.text()).then(data => {
					element.parentElement.innerHTML = data;
				});
			};
		});
	});
}