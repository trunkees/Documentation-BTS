<?php
include('../../Controller/LikeProjet/LikeProjet.php');

$likeProjet = new LikeProjet($bdd);
$likeCount = $likeProjet->countLikesForProject($projet_id);
$likeStatus = $likeProjet->verifierLike($projet_id, $_SESSION['InfoUser']['Profile_ID']);

echo '<div style="display: flex; align-items: center;">'; // Use flex display for positioning

if (!$likeStatus) {
    echo '<form method="post" action="../../Controller/LikeProjet/LikeProjet.php">
            <input type="hidden" name="Projet_ID" value="' . $projet_id . '">
            <input type="hidden" name="Profile_ID" value="' . $_SESSION['InfoUser']['Profile_ID'] . '">
            <input type="hidden" value="ajouter" name="action">
            <button type="submit" class="like-button" name="like"><i class="bi bi-suit-heart-fill"></i></button>
        </form>';
} else {
    echo '<form method="post" action="../../Controller/LikeProjet/LikeProjet.php">
            <input type="hidden" name="Projet_ID" value="' . $projet_id . '">
            <input type="hidden" name="Profile_ID" value="' . $_SESSION['InfoUser']['Profile_ID'] . '">
            <input type="hidden" value="supprimer" name="action">
            <button type="submit" class="unlike-button" name="unlike"><i class="bi bi-suit-heart-fill"></i></button>
        </form>';
}

echo '<span class="like-count">' . $likeCount . '</span>'; // Add margin for spacing

echo '</div>';
?>