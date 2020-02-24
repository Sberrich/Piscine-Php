<?php
function auth($login, $passwd)
{
    $find = false;
	$hash = hash('whirlpool',$passwd);
	$users = unserialize(file_get_contents('../private/passwd'));
		foreach ($users as $user) {
			if ($user['login'] == $login && $hash == $user['passwd'] ) {
                $find = true;
                break;
			}
        }
        if($find == false)
        {
            return (false);
        }
        else
        {
            return (true);
        }

}

?>