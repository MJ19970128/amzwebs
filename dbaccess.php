<?php
$dsn = 'mysql:host=database-mao.crqmemsomjjy.ap-northeast-1.rds.amazonaws.com;dbname=db_mao_system';
$username = 'svc_user';
$password = 'Aa451315';

// try-catch
try{
        $pdo = new PDO($dsn,$username,$password);

        $sql = "select created_at, info from site_view_history order by created_at desc limit 1";

        $stmt = $pdo->prepare($sql);

        $stmt -> execute();

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        $sqlins = "insert into site_view_history (info) values ('insert test from " . exec(hostname) . "')";

        $stmtins = $pdo->prepare($sqlins);

        $stmtins -> execute();

}catch (PDOException $e) {
}

function escape1($str)
{
    return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>test page for database access</title>
</head>
<body >
Add comment by Mamoru Maojun
Last Access Time<br><br>
<?php foreach ($rec as $a):?>
        <?=escape1($a)?><br>
<?php endforeach; ?>
</body>
</html>

