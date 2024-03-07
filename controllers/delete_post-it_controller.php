<?php
require_once('../model/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);
    // The file_get_contents("php://input") function retrieves the raw data from the incoming HTTP request.
    // The true option passed as the second argument to json_decode() indicates that we want the result to be returned in the form of an associative array rather than an object.
    if (isset($data['postId'])) {
        $req = $bdd->prepare('DELETE FROM post_its WHERE id = :id');
        $req->execute(array(
            'id' => $data['postId']
        ));

        if ($req->rowCount() > 0) {
            exit(json_encode(['success' => true]));
        } else {
            exit(json_encode(['success' => false, 'error' => 'La suppression a échoué.']));
        }
    } else {
        exit(json_encode(['success' => false, 'error' => 'ID du post-it non fourni']));
    }
} else {
    require 'views/homepage.php';
}
?>
