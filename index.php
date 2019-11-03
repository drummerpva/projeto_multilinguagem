<?php
    session_start();
    if(!empty($_GET['lang'])){
        $_SESSION['lang'] = $_GET['lang'];
    }
    require './config.php';
    require './Language.class.php';
    $lang = new Language();
?>
<a href="./?lang=en">English</a>
<a href="./?lang=pt-br">Português</a>
<a href="./?lang=es">Español</a>
<hr/>
Linguagem definida: <?php echo $lang->getLanguage();?>
<hr/>

<button><?php echo $lang->get('BUY');?></button><br/>
<a href=""><?php echo $lang->get('LOGOUT');?></a>
<hr/>
<?php echo $lang->get('NAME');?> :Douglas Poma<hr/>
Categoria: <?php echo $lang->get('CATEGORIA_PHOTO');?><hr/>
<?php
    $sql = $pdo->prepare("SELECT id, (SELECT valor FROM lang l WHERE l.lang = ? AND l.nome = c.lang_item) as nome FROM categorias c");
    $sql->execute(array($lang->getLanguage()));
    if($sql->rowCount() > 0){
        foreach ($sql->fetchAll() as $categoria){
            echo $categoria['nome']."<br/>";
        }
    }
?>