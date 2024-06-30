<?php
session_start();
$OPIS = "";


$_SESSION['type'] = $_POST['type'];
$_SESSION['country'] = $_POST['country'];
$_SESSION['townotpr'] = $_POST['townotpr'];
$_SESSION['townprib'] = $_POST['townprib'];
$_SESSION['mesta'] = $_POST['mesta'];
$_SESSION['cena'] = $_POST['cena'];


if(isset($_POST['townotpr'])) {
    if($_POST['townotpr'] == 'kazan') {
        $OPIS .= " AND Travels.place LIKE '%Казань%'";
    } elseif($_POST['townotpr'] == 'perm') {
        $OPIS .= " AND Travels.place LIKE '%Пермь%'";
    } elseif($_POST['townotpr'] == 'arkaim') {
        $OPIS .= " AND Travels.place LIKE '%Аркаим%'";
    } elseif($_POST['townotpr'] == 'saratov') {
        $OPIS .= " AND Travels.place LIKE '%Саратов%'";
    } elseif($_POST['townotpr'] == 'gelen') {
        $OPIS .= " AND Travels.place LIKE '%Геленджик%'";
    } elseif($_POST['townotpr'] == 'irkyrsk') {
        $OPIS .= " AND Travels.place LIKE '%Иркутск%'";
    }
}


if(isset($_POST['townprib'])) {
    if($_POST['townprib'] == 'kazan') {
        $OPIS .= " AND Travels.place LIKE '% Казань'";
    } elseif($_POST['townprib'] == 'perm') {
        $OPIS .= " AND Travels.place LIKE '% Пермь'";
    } elseif($_POST['townprib'] == 'arkaim') {
        $OPIS .= " AND Travels.place LIKE '% Аркаим'";
    } elseif($_POST['townprib'] == 'saratov') {
        $OPIS .= " AND Travels.place LIKE '% Саратов'";
    } elseif($_POST['townprib'] == 'gelen') {
        $OPIS .= " AND Travels.place LIKE '% Геленджик'";
    } elseif($_POST['townprib'] == 'irkyrsk') {
        $OPIS .= " AND Travels.place LIKE '% Иркутск'";
    }
}


if(isset($_POST['type'])) {
    if($_POST['type'] == 'tyr') {
        $OPIS .= " AND Travels.id_traveltype = 1";
    } elseif($_POST['type'] == 'kruiz') {
        $OPIS .= " AND Travels.id_traveltype = 2";
    }
}


if(isset($_POST['mesta'])) {
    if($_POST['mesta'] == '1') {
        $OPIS .= " AND Travels.mesta = 1";
    } elseif($_POST['mesta'] == '2') {
        $OPIS .= " AND Travels.mesta = 2";
    } elseif($_POST['mesta'] == '3') {
        $OPIS .= " AND Travels.mesta >= 3";
    }
}


if(isset($_POST['country'])) {
    if($_POST['country'] == 'rus') {
        $OPIS .= " AND Travels.place LIKE '%Россия%'";
    }
}


if(!empty($_POST['dateotpr'])) {
    $ab = $_POST['dateotpr'];
    $OPIS .= " AND Travels.dataotpr = '$ab'";
}


if(!empty($_POST['dateprib'])) {
    $as = $_POST['dateprib'];
    $OPIS .= " AND Travels.dataprib = '$as'";
}


if(isset($_POST['cena'])) {
    if($_POST['cena'] == 'povozrast') {
        $OPIS .= " ORDER BY Travels.cena ASC";
    } elseif($_POST['cena'] == 'poybivaniu') {
        $OPIS .= " ORDER BY Travels.cena DESC";
    }
}

$_SESSION['ab'] = $ab;
$_SESSION['as'] = $as;
$_SESSION['OPIS'] = $OPIS;

header("Location: ../bron.php");
?>