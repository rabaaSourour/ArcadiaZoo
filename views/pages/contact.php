<section class="d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center" style="margin:20px;">
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 text-center">
                        <h1>Contactez le Zoo</h1>
                    </div>
                    <div class="col-lg-12 Contact-form">
                    <form action="/Contact/sendContactMail" method="POST" enctype="multipart/form-data">
                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Votre e-mail :</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required>
                            <div class="invalid-feedback">
                                Veuillez entrer une adresse e-mail valide.
                            </div>
                        </div>

                        <!-- Titre -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre :</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Sujet de votre message" required>
                            <div class="invalid-feedback">
                                Veuillez entrer un titre pour votre message.
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description :</label>
                            <textarea id="description" name="description" class="form-control" rows="6" placeholder="Décrivez votre message ici..." required></textarea>
                            <div class="invalid-feedback">
                                Veuillez ajouter une description à votre message.
                            </div>
                        </div>

                        <!-- Bouton de soumission -->
                        <div class="col-12 login-btm login-button justify-content-center d-flex">
                            <button type="submit" class="btn btn-primary mt-3 mb-3" id="submit">Envoyer</button>
                        </div>
                    </form>

                    <!-- Message de confirmation -->
                    <div id="message" class="text-center text-success pt-3" style="display:none;">
                        Votre email a bien été envoyé !
                    </div>
                </div>
            </div>
        </div>
    </div>
