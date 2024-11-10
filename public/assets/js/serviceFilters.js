window.onload = () => {

    document.querySelectorAll('.btn').forEach(button => {

        button.addEventListener('click', () => {
            const category = button.getAttribute('data-category');

            if (category) {
                button.classList.remove('btn-yellow');
                button.classList.add('btn-blue');
            } else {
                button.classList.remove('btn-blue');
                button.classList.add('btn-yellow');
            }

            document.querySelectorAll('.btn').forEach(otherButton => {
                if (otherButton !== button) {
                    otherButton.classList.remove('btn-blue');
                    otherButton.classList.add('btn-yellow');
                }
            });
            
            // Create query string
            const Params = new URLSearchParams();
            Params.append('category', category);
            Params.append('ajax', '1');

            // Retrieve current URL
            const Url = new URL(window.location.href);
            
            // Ajax request
            fetch(Url.pathname + "?" + Params.toString(), {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            }).then(response => response.json())

            .then(data => {
                const content = document.getElementById("content");
                content.innerHTML = data.content;
                history.pushState({}, null, Url.pathname + "?" + Params.toString());
            }).catch(e => console.log(e));
        });
    });
}