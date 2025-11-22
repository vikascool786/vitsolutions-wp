document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("custom-contact-form");
    const form1 = document.getElementById("custom-contact-form1");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(form);

        fetch(window.location.href, {
            method: "POST",
            body: formData,
        })
            .then((res) => res.text())
            .then((html) => {
                // Replace form with success message
                form.reset();
                form1.innerHTML = "<div class='alert alert-success'>Message sent successfully!</div>";
                setTimeout(() => {
                    form1.innerHTML = "";
                }, 1000);
            })
            .catch(() => {
                form1.innerHTML = "<div class='alert alert-danger'>Something went wrong.</div>";
            });
    });
});