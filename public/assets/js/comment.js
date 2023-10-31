document.addEventListener("DOMContentLoaded", function() {
    // Add an event listener to the submit button
    document.getElementById("submit-comment").addEventListener("click", function() {
        // Serialize the form data
        const formData = new FormData(document.getElementById("comment-form"));

        // Send an AJAX request to submit the comment
        fetch(document.getElementById("comment-form").getAttribute("action"), {
            method: "POST",
            body: formData,
            headers: {
                "X-CSRF-TOKEN": formData.get("_token"),
            },
        })
            .then(response => response.json())
            .then(data => {
                // Handle the response from the server
                if (data.success) {
                    // Clear the comment input field
                    document.getElementById("comment").value = "";
                    // Update the comment section with the new comment
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
                } else {
                    alert("Comment submission failed. Please try again.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
    });
});
