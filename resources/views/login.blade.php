<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body class="app">
    <div id="loader" class="fadeOut">
        <div class="spinner"></div>
    </div>

    <script>
        window.addEventListener('load', function load() {
            const loader = document.getElementById('loader');
            setTimeout(function() {
                loader.classList.add('fadeOut');
            }, 300);
        });
    </script>
    <div class="peers ai-s fxw-nw h-100vh">
        <div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv"
            style="background-image: url(&quot;assets/static/images/bg.jpg&quot;)">
            <div class="pos-a centerXY">
                <div class="bgc-white bdrs-50p pos-r" style="width: 120px; height: 120px;">
                    <img class="pos-a centerXY" src="assets/static/images/logo.png" alt="">
                </div>
            </div>
        </div>
        <div id="loginForm" class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r ps" style="min-width: 320px;">
            <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
            <form>
                <div class="mb-3">
                    <label class="text-normal text-dark form-label">Email</label>
                    <input type="email" class="form-control" placeholder="John Doe" id="email">
                </div>
                <div class="mb-3">
                    <label class="text-normal text-dark form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Password" id="password">
                </div>
                <div class="">
                    <div class="peers ai-c jc-sb fxw-nw">
                        <div class="peer">
                            <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                                <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                                <label for="inputCall1" class="peers peer-greed js-sb ai-c form-label">
                                    <span class="peer peer-greed">Remember Me</span>
                                </label>
                            </div>
                        </div>
                        <div class="peer">
                            <button class="btn btn-primary btn-color" type="submit">Login</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const data = {
                email: formData.get('email'),
                password: formData.get('password')
            };

            fetch('http://localhost:8080/login', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message === "Login successful") {
                        alert("Login berhasil");
                        // Redirect ke halaman dashboard atau halaman lain
                        window.location.href = "/";
                    } else {
                        alert("Login gagal: " + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Terjadi kesalahan");
                });
        });
    </script>
</body>

</html>
