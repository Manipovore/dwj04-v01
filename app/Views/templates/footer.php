<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h4><span class="badge badge-secondary">Best Sellers</span></h4>
                <hr>
                <ul>
                    <li><a href="#"> <i class="fas fa-book"></i> Les aventures du train invisible </a></li>
                    <li><a href="#"> <i class="fas fa-book"></i> Wawa, Tom et Clara </a></li>
                    <li><a href="#"> <i class="fas fa-book"></i> 1610 </a></li>
                </ul>
            </div>
            <div class="col-md">
                <h4>Informations</h4>
                <hr>
                <ul>
                    <li> <a href="#"> <i class="fas fa-envelope"></i> Me contacter </a></li>
                    <li> <a href="#"> <i class="fas fa-info"></i> Profil </a></li>
                    <li> <a href="#"> <i class="fas fa-info"></i> Bio </a></li>
                </ul>
            </div>
            <div class="col-md">
                <h4>Newsletter</h4>
                <hr>
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Votre Email</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Rentrer votre Email">
                        <small id="emailHelp" class="form-text text-muted">Pas de pub, que des news sur le livre ;)</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </div>
        <hr>
        <p id="copyright">Copyright <?= date("Y");?> - Jean Forteroche - Développé par WEBAGENCY</p>
    </div>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?= Core\HTTP\url::getUrl(); ?>/public/js/pagination.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js"></script>
<script>
    window.addEventListener("load", function(){
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#252e39"
                },
                "button": {
                    "background": "transparent",
                    "text": "#14a7d0",
                    "border": "#14a7d0"
                }
            },
            "content": {
                "message": "Ce site utilise des cookies pour vous assurer la meilleure expérience sur notre site.",
                "dismiss": "Ok",
                "link": "En savoir plus!"
            }
        })});
</script>
</body>
</html>