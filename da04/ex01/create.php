<?php
    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK")
    {
		$find = false;
		if (!file_exists('../private')) {
			mkdir('../private');
		}
		if(file_exists("../private/passwd"))
		{
			$users = unserialize(file_get_contents('../private/passwd'));
			foreach ($users as $user) {
				if ($user['login'] === $_POST['login']) {
					$find = true;
				}
			}
		}
		if ($find) {
			echo "ERROR\n";
		}
	 	 else {
			$users[] = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
			file_put_contents('../private/passwd', serialize($users));
			echo "OK\n";
		}
	} else {
		echo "ERROR\n";
	} 
?>
