<!DOCTYPE html>
<html>
<head>
    <title>PhotoForYou</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css">
    <?php
    include ("include/entete.inc.php");

    ?>
</head>
<body>
  <?php
  function displaysell($db) {
            

            
  }
  ?>
    <h1 style="text-align: center; margin-top: 100px;">Historique des factures</h1>
    <table class="table" data-toggle="table" data-pagination="true" data-search="true"  data-page-size="25" data-page-list="[10,25,50,100]" data-sort-name="date" data-sort-order="desc">
        <thead class="thead-dark">
        <tr>
          <th data-sortable="true" data-field="date" scope="col">Date</th>
          <th data-field="cid" scope="col">ID Transaction</th>
          <th data-field="nom" scope="col">Nom photo</th>
          <th data-field="desc" scope="col">Descritpion</th>
          <th data-field="prix" scope="col">Prix</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $q = $db->query('SELECT id,id_photo,date_trans,prix FROM photobuy WHERE id_user = '.$_SESSION['Id']);

          foreach ($q as $row) {
              $info = $pmanager->getcart($row['id_photo']);
              $dateupload = (string) $row['date_trans'];
              $dateupload_jour = substr($dateupload, 8, 2);
              $dateupload_mois = substr($dateupload, 5, 2);
              $dateupload_annee = substr($dateupload, 0,4);
              $datexs = $dateupload_annee.$dateupload_mois.$dateupload_jour;
              echo "  <tr>
                        <td> <span style='display: none'>".$datexs."</span>".$row['date_trans']."</td>
                        <td>".$row['id']."</td>
                        <td>".$info->getNom_photo()."</td>
                        <td>".$info->getDescription()."</td>
                        <td>".$row['prix']."</td>
                      </tr>";

            }
        ?>
      </tbody>
    </table>


<?php
    include ("include/piedDePage.inc.php");
?>
<script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>


</body>
</html>









