<?php
session_start();
if(@$_SESSION['OPIS'] == ''){
  $OPIS = 'WHERE 1';
}

if(@$_SESSION['ab'] == ''){
  $ab = 'Дата отправки';
}
if(@$_SESSION['as'] == ''){
  $as = 'Дата прибытия';
}




?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/horizon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./scss/bron.css">
    <title>Horizon</title>

  </head>
  <body>
  <header>
      <div class="countainer">
        <div class="header-up">
          <div class="menu">
            <div class="menu-left">
              <a href="index.php" id="change" class="menu-left__logo"><img class="logo" src="./public/horizon.svg"></a>
              <div class="burger">
              <a href="bron.php" class="menu-left__item">Бронирование</a>
              <a href="uslygi.php" class="menu-left__item">Услуги</a>
              <a href="contacts.php" class="menu-left__item">Контакты</a></div>
            </div>
            <div class="menu-right">
              <div class="telephone">
                <img class="telephone__icon" src="./public/teleicon.svg">
                <a href="#" class="telephone__number">+7-985-842-04-42</a>
              </div>
              <div class="header-button">
                <?php
                if(@$_SESSION["userinfo"] ["email"] == ""){
                    echo "<a class='button-all' href='vhodreg.php'>";
                    echo "<img class='logo' src='./public/profil.svg'>";
                      echo "<p class='button-all__btn' >Войти</p>";
                      echo "</a>";
                  }
                  else{
                    echo "<a class='button-all' href='account.php'>";
                    echo "<img class='logo' src='./public/profil.svg'>";
                      echo "<p class='button-all__btn' >";
                      echo $_SESSION["userinfo"]["name"];
                      echo "</p>";
                      echo "</a>";
                  }
                  ?>
              </div>
            </div>
            <div class="menu1-btn">
            <span></span>
            <span></span>   
            <span></span>
            </div>
          </div>
        </div>
      </div>
    </header>
    <section>
<div class="countainer">
  <div class="booking">
    <?php
    ?>
    <form class="filter" action="./php/filter.php" method="post">
    <select name="type" id="type-select" class="filter__type">
    <option value="ymolch" <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == 'ymolch') ? 'selected' : ''; ?>>Тип</option>
    <option value="tyr" <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == 'tyr') ? 'selected' : ''; ?>>Тур</option>
    <option value="kruiz" <?php echo (isset($_SESSION['type']) && $_SESSION['type'] == 'kruiz') ? 'selected' : ''; ?>>Круиз</option>
  </select>
  <select name="country" id="country-select" class="filter__country">
    <option value="ymolch" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] == 'ymolch') ? 'selected' : ''; ?>>Страна</option>
    <option value="rus" <?php echo (isset($_SESSION['country']) && $_SESSION['country'] == 'rus') ? 'selected' : ''; ?>>Россия</option>
  </select>
  <select name="townotpr" id="townotpr-select" class="filter__townotpr">
    <option value="ymolch" <?php echo (isset($_SESSION['townotpr']) && $_SESSION['townotpr'] == 'ymolch') ? 'selected' : ''; ?>>Город отправления</option>
    <option value="kazan" <?php echo (isset($_SESSION['townotpr']) && $_SESSION['townotpr'] == 'kazan') ? 'selected' : ''; ?>>Казань</option>
    <option value="perm" <?php echo (isset($_SESSION['townotpr']) && $_SESSION['townotpr'] == 'perm') ? 'selected' : ''; ?>>Пермь</option>
    <option value="arkaim" <?php echo (isset($_SESSION['townotpr']) && $_SESSION['townotpr'] == 'arkaim') ? 'selected' : ''; ?>>Аркаим</option>
    <option value="saratov" <?php echo (isset($_SESSION['townotpr']) && $_SESSION['townotpr'] == 'saratov') ? 'selected' : ''; ?>>Саратов</option>
    <option value="gelen" <?php echo (isset($_SESSION['townotpr']) && $_SESSION['townotpr'] == 'gelen') ? 'selected' : ''; ?>>Геленджик</option>
    <option value="irkyrsk" <?php echo (isset($_SESSION['townotpr']) && $_SESSION['townotpr'] == 'irkyrsk') ? 'selected' : ''; ?>>Иркутск</option>
  </select>
  <select name="townprib" id="townprib-select" class="filter__townprib">
    <option value="ymolch" <?php echo (isset($_SESSION['townprib']) && $_SESSION['townprib'] == 'ymolch') ? 'selected' : ''; ?>>Город прибытия</option>
    <option value="kazan" <?php echo (isset($_SESSION['townprib']) && $_SESSION['townprib'] == 'kazan') ? 'selected' : ''; ?>>Казань</option>
    <option value="perm" <?php echo (isset($_SESSION['townprib']) && $_SESSION['townprib'] == 'perm') ? 'selected' : ''; ?>>Пермь</option>
    <option value="arkaim" <?php echo (isset($_SESSION['townprib']) && $_SESSION['townprib'] == 'arkaim') ? 'selected' : ''; ?>>Аркаим</option>
    <option value="saratov" <?php echo (isset($_SESSION['townprib']) && $_SESSION['townprib'] == 'saratov') ? 'selected' : ''; ?>>Саратов</option>
    <option value="gelen" <?php echo (isset($_SESSION['townprib']) && $_SESSION['townprib'] == 'gelen') ? 'selected' : ''; ?>>Геленджик</option>
    <option value="irkyrsk" <?php echo (isset($_SESSION['townprib']) && $_SESSION['townprib'] == 'irkyrsk') ? 'selected' : ''; ?>>Иркутск</option>
  </select>
      <input name="dateotpr" type="text" placeholder="<?php echo @$_SESSION['ab'] == '' ? 'Дата отправки' : $_SESSION['ab']; ?>"  class="filter__dateotpr" onfocus="this.type='date'" onblur="this.type='text' "/>
      <input name="dateprib" type="text" placeholder="<?php echo @$_SESSION['as'] == '' ? 'Дата прибытия' : $_SESSION['as']; ?>" class="filter__dateprib" onfocus="this.type='date'" onblur="this.type='text'"/>
      <select name="mesta" id="mesta-select" class="filter__mesta">
      <option value="ymolch" <?php echo (isset($_SESSION['mesta']) && $_SESSION['mesta'] == 'ymolch') ? 'selected' : ''; ?>>Места</option>
    <option value="1" <?php echo (isset($_SESSION['mesta']) && $_SESSION['mesta'] == '1') ? 'selected' : ''; ?>>На одного</option>
    <option value="2" <?php echo (isset($_SESSION['mesta']) && $_SESSION['mesta'] == '2') ? 'selected' : ''; ?>>На двоих</option>
    <option value="3" <?php echo (isset($_SESSION['mesta']) && $_SESSION['mesta'] == '3') ? 'selected' : ''; ?>>От трех</option>
  </select>
  <select name="cena" id="cena-select" class="filter__cena">
    <option value="ymolch" <?php echo (isset($_SESSION['cena']) && $_SESSION['cena'] == 'ymolch') ? 'selected' : ''; ?>>По умолчанию</option>
    <option value="povozrast" <?php echo (isset($_SESSION['cena']) && $_SESSION['cena'] == 'povozrast') ? 'selected' : ''; ?>>По возрастанию</option>
    <option value="poybivaniu" <?php echo (isset($_SESSION['cena']) && $_SESSION['cena'] == 'poybivaniu') ? 'selected' : ''; ?>>По убыванию</option>
  </select>
      <input class="filter__btn" type="submit" name="search" id="search" value="Поиск" />
    </form>
    <div class="catalog-cards">
      <div class="cards">
        <?php
        $mysql=mysqli_connect('localhost','root','','horizon');
        @$OPIS = $_SESSION['OPIS'];


        $_provid = ("    SELECT 
        Travels.id_travel,
        Travels.img, 
        Travels.place, 
        Travels.title, 
        Travels.mesta, 
        Travels.dataotpr, 
        Travels.dataprib, 
        traveltype.title AS traveltype, 
        Travels.cena
    FROM Travels
    JOIN traveltype ON Travels.id_traveltype = traveltype.id_traveltype
    $OPIS
        ");
        $result = mysqli_query($mysql,$_provid);
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<form class='card' action='card.php' method='POST'>";
          echo "  <img class='card__img' src='./public/";
          echo $row["img"];
          echo " '>";
          echo "  <div class='card-place'>";
          echo "    <img class='card-place__icon' src='./public/mesto.svg'>";
          echo "    <p class='card-place__title'>";
          echo $row["place"];
          echo "  </p>";
          echo "  </div>";
          echo "  <div class='info'>";
          echo "    <p class='info__title'>";
          echo $row["title"];
          echo "  </p>";
          echo "    <div class='block-stars'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "      <img class='block-stars__star' src='./public/star.svg'>";
          echo "    </div>";
          echo "  </div>";
          echo "  <p class='card__kolvo'>Места: ";
          echo $row["mesta"];
          echo "  </p>";
          echo "  <p class='card__timeotp'>Дата отправки: ";
          echo date("d.m.Y", strtotime($row["dataotpr"]));
          echo "  </p>";
          echo "  <p class='card__timeprib'>Дата прибытия: ";
          echo date("d.m.Y", strtotime($row["dataprib"]));
          echo "  </p>";
          echo "  <p class='card__type'>";
          echo $row["traveltype"];
          echo "  </p>";
          echo "  <p class='card__minicena'>Цена от</p>";
          echo "  <p class='card__cena'>";
          $formattedPrice = number_format($row['cena'], 2, ',', ' ');
          echo $formattedPrice;
          echo "  ₽</p>";
          $id_travel = $row["id_travel"];

          echo "<input  type='hidden' name='subscribe1'  value='$id_travel'/>";
          echo "<input class='card__btn' type='submit' name='subscribe'  />";
          echo "</form>";

      }

        ?>
      </div>
    </div>
  </div>
</div>
</section>
    <div id="footer"></div>
    <script type="module" src="bron.js"></script>
  </body>
</html>