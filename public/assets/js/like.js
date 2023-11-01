document.addEventListener("DOMContentLoaded", function() {
    const likeButtons = document.querySelectorAll('[id^="like-button-"]');

    likeButtons.forEach(function(likeButton) {
        likeButton.addEventListener("click", function() {
            const postId = likeButton.id.split('-')[2];
            const likeForm = document.getElementById("like-form-" + postId);
            const likeCount = document.getElementById("like-count-" + postId);
            const randomLikeCount = document.getElementById("random-like-count-" + postId);
            const randomLikeButton = document.getElementById("random-like-button-" + postId);

            const formData = new FormData(likeForm);

            fetch(likeForm.getAttribute("action"), {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": formData.get("_token"),
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.liked) {
                        likeButton.innerHTML = '<i class="fas fa-heart" style="color: #ff0000;"></i>';
                        likeCount.textContent = data.likeCount + 1;
                        if (randomLikeButton) {
                            randomLikeButton.innerHTML = '<i class="fas fa-heart" style="color: #ff0000;"></i>';
                        }
                        if (randomLikeCount) {
                            randomLikeCount.textContent = data.likeCount + 1;
                        }
                    } else {
                        likeButton.innerHTML = '<i class="far fa-heart" style="color: #ff0000;"></i>';
                        likeCount.textContent = data.likeCount - 1;
                        if (randomLikeButton) {
                            randomLikeButton.innerHTML = '<i class="far fa-heart" style="color: #ff0000;"></i>';
                        }
                        if (randomLikeCount) {
                            randomLikeCount.textContent = data.likeCount - 1;
                        }
                    }
                })
                .catch(error => console.error(error));
        });
    });

    const randomLikeButtons = document.querySelectorAll('[id^="random-like-button-"]');

    randomLikeButtons.forEach(function(randomLikeButton) {
        randomLikeButton.addEventListener("click", function() {
            const postId = randomLikeButton.id.split('-')[3];
            const randomLikeForm = document.getElementById("random-like-form-" + postId);
            const randomLikeCount = document.getElementById("random-like-count-" + postId);
            const likeCount = document.getElementById("like-count-" + postId);
            const likeButton = document.getElementById("like-button-" + postId);

            const formData = new FormData(randomLikeForm);

            fetch(randomLikeForm.getAttribute("action"), {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": formData.get("_token"),
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.liked) {
                        randomLikeButton.innerHTML = '<i class="fas fa-heart" style="color: #ff0000;"></i>';
                        randomLikeCount.textContent = data.likeCount + 1;
                        if (likeButton) {
                            likeButton.innerHTML = '<i class="fas fa-heart" style="color: #ff0000;"></i>';
                        }
                        if (likeCount) {
                            likeCount.textContent = data.likeCount + 1;
                        }
                    } else {
                        randomLikeButton.innerHTML = '<i class="far fa-heart" style="color: #ff0000;"></i>';
                        randomLikeCount.textContent = data.likeCount - 1;
                        if (likeButton) {
                            likeButton.innerHTML = '<i class="far fa-heart" style="color: #ff0000;"></i>';
                        }
                        if (likeCount) {
                            likeCount.textContent = data.likeCount - 1;
                        }
                    }
                })
                .catch(error => console.error(error));
        });
    });
});
