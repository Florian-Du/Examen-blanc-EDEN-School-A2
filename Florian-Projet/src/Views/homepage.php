<?php

ob_start();

?>
    <section id="bloc-filtre">
        <h2 id="titre_bloc_filtre">Rechercher un livre</h2>
        <div id="bloc_boutton_filtre">
            <i class="fas fa-minus-circle" onclick="menuFiltre()"></i>
        </div>
        <form action="/filtrage" method="POST" id="formulaire" name="formulaire">
            <!-- Label des select-->
            <div id="espace1">
                <label class="labels" for="nombre-page">Nombre de page</label>

                <label class="labels" id="labels2" for="auteur">Auteur</label>
            </div>
            <div id="espace2">
                <!-- les select -->
                <select onchange="activeButton()" name="nombre-page" id="nombre-page">
                    <option value="> 0">Tout</option>
                    <option value="< 50">0 à 50 pages</option>
                    <option value="BETWEEN 50 AND 100">50 à 100 pages</option>
                    <option value="BETWEEN 100 AND 300">100 à 300 pages</option>
                    <option value="> 300">plus de 300 pages</option>
                </select>


                <select onchange="activeButton()" name="auteur" id="auteur">
                    <option value="IS NOT NULL">Tout</option>
                    <?php
                        foreach ($auteurs as $auteur) {
                    ?>
                            <option value="= <?= $auteur->getIdAuthor() ?>"><?= $auteur->getNameAuthor() ?> <?= substr($auteur->getFirstNameAuthor(),0, 1) ?>.</option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <!-- toutes les checkbox-->
            <div id="espace3">
                <label id="labels" for="categorie">Catégorie :</label>
                <div class="checkbox">
                    <input onchange="activeButton()" onclick="checkbox(event)" type="checkbox" class="lescheckbox" id="tout_cat" name="categorie" value="IS NOT NULL" checked>
                    <label for="tout_cat">Tout</label>

                </div>
                <?php
                foreach ($lescatgories as $lacatgorie) {
                    ?>
                    <div class="checkbox">
                        <input onchange="activeButton()" onclick="checkbox(event)" type="checkbox" class="lescheckbox" id="<?= $lacatgorie->getNameCat() ?>" name="categorie" value="= <?= $lacatgorie->getIdCat() ?>">
                        <label for="<?= $lacatgorie->getNameCat() ?>"><?= $lacatgorie->getNameCat() ?></label>

                    </div>
                    <?php
                }
                ?>
            </div>
            <!-- les bouttons de valdiation des filtres et de reinitialisation des filtres -->

        </form>
        <div id="groupebutton">
            <a id="buttondelete" href="/">Effacer les filtres</a>
            <button class="buttonFiltre" type="submit" form="formulaire">Filtrer</button>
        </div>

    </section>
    <section id="bloc-filtre-retracter">
        <h2 id="titre_bloc_filtre">Rechercher un livre</h2>
        <div id="bloc_boutton_filtre">
            <i class="fas fa-plus-circle" onclick="menuFiltreOpen()"></i>
        </div>
    </section>
    <!-- Vue Ordinateur -->
    <section id="BlocLivres">
        <h2>Tous les livres (<?php echo $nombreLivre[0]->getNombreLivre(); ?>)</h2>
        <table>
            <!-- titres des colonnes du tableau-->
            <thead>
            <tr>
                <th id="tailleTableau"></th>
                <th id="tailleTableaubig">Titre du livre</th>
                <th class="tailleTableau">Auteur</th>
                <th class="tailleTableau">Categorie</th>
                <th class="tailleTableau">Disponibilité</th>
                <th id="tailleTableaulittle"></th>
            </tr>
            </thead>
            <!-- les colonnes du tableau avec toutes les donnes des livres -->
            <tbody>
            <?php
            $cpt = 0;
                foreach ($livres as $livre) {

            ?>
                    <tr>
                        <td class="littlepaddingbottom"><div class="<?php
                            // si il y a une date de disponibilite on met le trait en gris sinon en bleu
                            if ($livre->getDateDisponibilite() != NULL) {
                                echo 'traitReserver';
                            }else {
                                echo 'traitDisponible';
                            }

                            ?>"></div></td>

                        <td onclick="makeRequest('<?= addcslashes($livre->getTitle(),"\'") ?>')" class="titreLivre"><?= $livre->getTitle() ?></td>
                        <td><?= $livre->getFirstNameAuthor() ?> <?= $livre->getNameAuthor() ?></td>
                        <td><?php
                            // si l'id du livre correspond a l'id du livre des category alros on affiche toutes les category lier au livres
                            foreach ($categories[$cpt] AS $category) {
                                if ($category->getIdBook() == $livre->getIdBook()){
                                    echo $category->getNameCat().' ';
                                }

                            }

                            ?></td>
                        <td><?= $livre->getDateDisponibilite() ?></td>
                        <td><button class="<?php
                            // si il y a une date de disponibilite on met le boutton en gris sinon en bleu
                            if ($livre->getDateDisponibilite() != NULL) {
                                echo 'Reserver';
                            }else {
                                echo 'Disponible';
                            }

                            ?>">Réserver</button></td>
                    </tr>
            <?php
                    $cpt++;
                }
            ?>
            </tbody>
        </table>
    </section>
    <!-- Vue Mobile -->
    <section id="BlocLivresPhone">
        <h2>Tous les livres (<?php echo $nombreLivre[0]->getNombreLivre(); ?>)</h2>
        <h3>Titre du livre</h3>
        <!-- chaque div = une ligne avec des informations-->
        <?php
            $cpt = 0;
            foreach ($livres as $livre) {
        ?>
        <div class="rows">
                <div class="<?php
                // si il y a une date de disponibilite on met le trait en gris sinon en bleu
                if ($livre->getDateDisponibilite() != NULL) {
                    echo 'traitReserver';
                }else {
                    echo 'traitDisponible';
                }

                ?>"></div>
                <div onclick="makeRequest('<?= addcslashes($livre->getTitle(),"\'") ?>')" class="contenue">
                    <p class="Titre"><?= $livre->getTitle() ?></p>
                    <p class="Auteur"><?= $livre->getFirstNameAuthor() ?> <?= $livre->getNameAuthor() ?></p>
                    <p class="Categorie"><?php
                        // si l'id du livre correspond a l'id du livre des category alros on affiche toutes les category lier au livres
                        foreach ($categories[$cpt] AS $category) {
                            if ($category->getIdBook() == $livre->getIdBook()){
                                echo $category->getNameCat().' ';
                            }

                        }

                        ?></p>
                </div>
                <button class="<?php
                // si il y a une date de disponibilite on met le boutton en gris sinon en bleu
                if ($livre->getDateDisponibilite() != NULL) {
                    echo 'Reserver';
                }else {
                    echo 'Disponible';
                }

                ?>">Réserver</button>
        </div>
        <?php
                $cpt++;
            }
        ?>
    </section>
<?php
$content = ob_get_clean();
require VIEWS . 'layout.php';

