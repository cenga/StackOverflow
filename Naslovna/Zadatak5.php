<?php
function zaglavlje() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {
    $id = $data["autor"];
    $broj = $data["x"];
    $veza = new PDO("mysql:dbname=spirala4;host=127.3.47.130;charset=utf8", "admin79xADN4", "XnzWJLm_gPwD");
    $upit = $veza->prepare("SELECT * FROM vijest where FK_user=?");
    $upit->execute(array($id));

    $vijesti = array();
    $brojac = 0;
    foreach($upit->fetchAll(PDO::FETCH_ASSOC) as $vijest)
    {
        array_push($vijesti, $vijest);
        $brojac = $brojac + 1;
        if($brojac == $broj)
            break;
    }
    echo json_encode($vijesti);
}
function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }
$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];
switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zaglavlje(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zaglavlje(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zaglavlje(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zaglavlje(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>