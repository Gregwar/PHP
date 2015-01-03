<?php include('header.php'); ?>

<h2>Créer un sondage</h2>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['question']) && !empty($_POST['answer1'])
        && !empty($_POST['answer2']) && isset($_POST['answer3'])) {
            $pdo->exec('INSERT INTO polls (question,answer1,answer2,answer3)
                VALUES ("'.$_POST['question'].'","'.$_POST['answer1'].'",
                    "'.$_POST['answer2'].'","'.$_POST['answer3'].'")');
?>
<div class="alert alert-success">
    Sondage ajouté.
</div>
<?php
    } else {
?>
<div class="alert alert-danger">
    Erreur de formulaire: vous devez préciser la question et au moins 2 réponses.
</div>
<?php
    }
}

?>

<form method="post" class="form-horizontal">
    <div class="form-group">
        <label class="col-sm-2" for="question">Question</label>
        <div class="col-sm-10">
            <input required="required" class="form-control" type="text" id="question" name="question" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2" for="answer1">Réponse 1</label>
        <div class="col-sm-10">
            <input required="required" class="form-control" type="answer1" id="answer1" name="answer1" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2" for="answer2">Réponse 2</label>
        <div class="col-sm-10">
            <input required="required" class="form-control" type="answer2" id="answer2" name="answer2" />
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2" for="answer3">Réponse 3</label>
        <div class="col-sm-10">
            <input class="form-control" type="answer3" id="answer3" name="answer3" />
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2">&nbsp;</div>
        <div class="col-sm-10">
            <input type="submit" class="btn btn-success" value="Enregistrer" />
        </div>
    </div>
</form>

<?php include('footer.php'); ?>
