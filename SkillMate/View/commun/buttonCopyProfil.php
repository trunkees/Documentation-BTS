<?php
    // Assurez-vous que $Pseudo est défini avant de l'utiliser
    $Pseudo = isset($Pseudo) ? $Pseudo : "";
    $valeur_a_copier_pseudo = "skillmate.com/" . urlencode($Pseudo);
?>

<input type="text" value="<?php echo $valeur_a_copier_pseudo; ?>" id="valeurPseudo" style="display: none;" readonly>
<div onclick="copierDansPressePapiersPseudo()" style="cursor: pointer; width: 25px; height: 25px;">
    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z"/>
    </svg>
</div>

<script>
    function copierDansPressePapiersPseudo() {
        var champDeTexte = document.getElementById("valeurPseudo");

        // Créer un champ de texte temporaire
        var champTemporaire = document.createElement("textarea");
        champTemporaire.value = champDeTexte.value;
        document.body.appendChild(champTemporaire);

        // Sélectionner le texte du champ temporaire
        champTemporaire.select();
        champTemporaire.setSelectionRange(0, 99999);

        try {
            // Exécuter la commande de copie
            document.execCommand("copy");

            // La copie a réussi
            champTemporaire.blur();
            alert("Valeur copiée : " + champTemporaire.value);
        } catch (err) {
            // Gérer les erreurs liées à la copie dans le presse-papiers
            console.error("Erreur lors de la copie dans le presse-papiers : ", err);
            alert("Erreur lors de la copie dans le presse-papiers. Veuillez copier manuellement.");
        } finally {
            // Supprimer le champ de texte temporaire
            document.body.removeChild(champTemporaire);
        }
    }
</script>