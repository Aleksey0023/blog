document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("submit-comment").addEventListener("click", function () {
        const formData = new FormData(document.getElementById("comment-form"));

        fetch(document.getElementById("comment-form").getAttribute("action"), {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": formData.get("_token"),
            },
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("comment").value = "";
                    const commentSection = document.querySelector(".comment_list");
                    commentSection.insertAdjacentHTML("beforeend", `
                        <div class="comment-text mb-5" data-aos="fade-up">
                            <span class="username">
                                <span class="text-muted float-right">${data.timeAgo}</span>
                                <div class="font-weight-bold mb-2">${data.username}</div>
                            </span>
                            ${data.comment}
                        </div>
                    `);

                    const commentCount = document.getElementById("comment-count");
                    const currentCount = parseInt(commentCount.textContent);
                    commentCount.textContent = currentCount + 1;

                    const commentCount2 = document.getElementById("comment-count2");
                    const currentCount2 = parseInt(commentCount2.textContent);
                    commentCount2.textContent = currentCount2 + 1;
                } else {
                    alert("Comment submission failed. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
});
