   
    <main>

        <form method="POST" action= "">

            <h1 class="contact"> Contactez-nous <img width="30px" src="../public/assets/Images/logoPlane (4).svg" ></h1>
            <div class="email">
                <p> Entrez votre Email </p>
                <input type="email" name="email" placeholder="Entrez votre email">
            </div>
            <div class="prenom">
                <p> Entrez votre prénom</p>
                <input type="prenom" name="prenom" placeholder="Entrez votre prénom">
            </div>
            <div class="nom">
                <p> Entrez votre nom</p>
                <input type="nom" name="nom" placeholder="Entrez votre nom">
            </div>

            <div class="select">
                <p> Le message concerne: </p>
                <select name="categorie" id="" >
                    <option value="Horaires"> Horaires </option>
                    <option value="Localisation"> Localisation </option>
                    <option value="paiement"> mode de paiement </option>
                    <option value="Autres"> Autres </option>
                </select>
            </div>
            <div class="area">
                <p> Votre message: </p>
                <textarea name="longtexte" id="area" cols="57"rows="10"></textarea>
            </div>

            <input type="submit" name="Envoyer"/>


        </form>

    </main>
