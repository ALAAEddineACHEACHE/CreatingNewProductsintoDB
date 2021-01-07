<?php 
function chargerCategorie() {
    global $connexion;
    $str = '';
    $result = mysqli_query($connexion, 'SELECT * FROM categorie', MYSQLI_STORE_RESULT);
    while($row = mysqli_fetch_row($result)) {
        $str .= "<option value='$row[0]'>" . $row[1] . '</option>';
    }
    return $str;
}
?>