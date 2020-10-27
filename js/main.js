const form = document.getElementById('login');
form.addEventListener('submit', function (e) {
    e.preventDefault();
    var http = new XMLHttpRequest();
    var url = 'action.php';
    var params = new FormData(form);
    http.open('POST', url, true);
    http.onreadystatechange = function () {
        if (http.readyState == 4 && http.status == 200) {
            let resp = JSON.parse(http.responseText);
            if (resp.response == 'true') {
                document.getElementById('resp').innerHTML = "Correct Access";
                setTimeout(function () {
                    window.location.href = "php_crud_mysql/index.php";
                }, 2000);
            } else {
                alert("Try again error");
            }
        }
    }
    http.send(params);
});