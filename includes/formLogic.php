<?php
require('includes/forms.php');
$form = new P2\Form($_GET);

if ($form->isSubmitted() && $_GET['measure']=='imperial') {
    $errors = $form->validate(
        [
            'age' => 'numeric|min:16|max:130',
            'weight' => 'numeric|min:50|max:350',

        ]
    );
}
elseif ($form->isSubmitted() && $_GET['measure']=='metric'){
    $errors = $form->validate(
        [
            'age' => 'numeric|min:16|max:130',
            'weight' => 'numeric|min:30|max:200',
            'height' => 'numeric|min:30|max:200',

        ]
    );
}
?>