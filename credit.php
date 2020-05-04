<!DOCTYPE html>
<html>
<head>
    <title>PhotoForYou</title>
    <?php
    include ("include/entete.inc.php");
    ?>
</head>
<body>
  <div class="container text-center">
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Abonnement</h1>
      <p class="lead">Une tarification flexible.</p>
    </div>
    <div class="card-deck mb-3 text-center">   
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Essai</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>5 photos offertes</li>
            <li>Usage privé</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-outline-primary">Faire un essai</button>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Formule Découverte</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">9 € <small class="text-muted">/ mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>2 crédits</li>
            <li>20 % de remise sur les photos</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</button>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Formule pro</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">19 € <small class="text-muted">/ mois</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>4 crédits</li>
            <li>30 % de remise sur les photos</li>
          </ul>
          <button type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</button>
        </div>
      </div>
    </div>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Acheter des crédit</h1>
      <p class="lead">DIfférentes tarifications flexible.</p>
    </div>
    <div class="card-deck mb-3 text-center">   
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Tiers 1</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">5 <small class="text-muted">€</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>1 Crédit</li>
          </ul>
          <a href="payementcredit.php?credit=1" type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</a>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Tiers 2</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">25 <small class="text-muted">€</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>5 crédits</li>
          </ul>
          <a href="payementcredit.php?credit=2" type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</a>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Tiers 3</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">50 <small class="text-muted">€</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>10 crédits</li>
          </ul>
          <a href="payementcredit.php?credit=3" type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</a>
        </div>
      </div>
    </div>
    <div class="card-deck mb-3 text-center">
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Tiers 4</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">124.99 <small class="text-muted">€</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>25 crédits</li>
          </ul>
          <a href="payementcredit.php?credit=4" type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</a>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Tiers 5</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">249.99 <small class="text-muted">€</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>50 crédits</li>
            <li>1 mois de formule découverte offert</li>
          </ul>
          <a href="payementcredit.php?credit=5" type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</a>
        </div>
      </div>
      <div class="card mb-4 box-shadow">
        <div class="card-header">
          <h4 class="my-0 font-weight-normal">Tiers 6</h4>
        </div>
        <div class="card-body">
          <h1 class="card-title pricing-card-title">489.99 <small class="text-muted">€</small></h1>
          <ul class="list-unstyled mt-3 mb-4">
            <li>100 crédits</li>
            <li>1 mois de formule pro offert</li>
          </ul>
          <a href="payementcredit.php?credit=6" type="button" class="btn btn-lg btn-block btn-outline-primary">Acheter</a>
        </div>
      </div>
    </div>
  </div>

  <?php
  include ("include/piedDePage.inc.php");
  ?>
</body>
</html>