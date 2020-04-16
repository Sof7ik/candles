<?

setcookie(
    'userInfo',
    '',
    time()-604800,
    '/'
);

header('Location: /index.php');

?>