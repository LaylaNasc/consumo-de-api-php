<?php
defined('CONTROL') or die('Acesso inválido');

$api = new ApiConsumo();
$pais = $_GET['nomePais'] ?? null;

if(!$pais){
    header('Location: ?route=home');
    die();
}

$dadosPais = $api->buscarPais($pais);

if (!$dadosPais || !isset($dadosPais[0])) {
    header('Location: ?route=404');
    die();
}

$flag = $dadosPais[0]['flags']['png'] ?? 'Não disponível';
$nome = $dadosPais[0]['name']['common'] ?? 'Não disponível';
$capital = $dadosPais[0]['capital'][0] ?? 'Não disponível';
$regiao = $dadosPais[0]['region'] ?? 'Não disponível';
$subregiao = $dadosPais[0]['subregion'] ?? 'Não disponível';
$populacao = $dadosPais[0]['population'] ?? 'Não disponível';
$area = $dadosPais[0]['area'] ?? 'Não disponível';
?>

<div class="container mt-5">
    <div class="d-flex">
        <div class="card p-2 shadow">
            <?php if ($flag): ?>
                <img src="<?= $flag ?>" alt="Bandeira de <?= $nome ?>">
            <?php else: ?>
                <p>Bandeira não disponível</p>
            <?php endif; ?>
        </div>
        <div class="ms-5 align-self-center">
            <p class="display-3"><strong><?= $nome ?></strong></p>
            <p class="p-0 m-0">Capital:</p>
            <h4 class="p-0 m-0"><?= $capital ?></h4>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <p>Região:<br><strong><?= $regiao ?></strong></p>
            <p>Sub Região:<br><strong><?= $subregiao ?></strong></p>
            <p>População:<br><strong><?= $populacao ?></strong> habitantes</p>
            <p>Área:<br><strong><?= $area ?></strong> Km<sup>2</sup></p>
        </div>
    </div>
    
    <div>
        <a href="?rout=home" class="btn btn-primary px-5">Voltar</a>
    </div>

</div>