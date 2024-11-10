window.onload = () => {

    const filtersForm = document.getElementById('filters');

    document.querySelectorAll("#filters input, #filters select").forEach(element => {
        element.addEventListener('change', () => {
            const form = new FormData(filtersForm);
            const params = new URLSearchParams();

            form.forEach((value, key) => {
                params.append(key, value);
            });

            const url = new URL(window.location.href);
            
            url.search = params.toString();

            fetch(url.pathname  + url.search, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(response => response.json())

            .then(data => {
                const content = document.getElementById("content");
                content.innerHTML = data.content;
                history.pushState({}, null, url.pathname + "?" + url.search);
            })
            .catch(e => console.log(e));
        });
    });
};
