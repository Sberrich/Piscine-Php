<?php
    if ($_POST['login'] && $_POST['oldpw'] &&  $_POST['newpw'] && $_POST['submit'] == "OK")
    {
		$find = false;
		$hash = hash('whirlpool',$_POST['oldpw']);
		$users = unserialize(file_get_contents('../private/passwd'));
		$i = 0;
		foreach ($users as $user) {
			if ($user['login'] == $_POST['login'] && $hash == $user['passwd'] ) {
				$find = true;
				break;
			}
			$i++;
		}
		if ($find) {
				$new =  hash('whirlpool',$_POST['newpw']);
				$users[$i]['passwd'] = $new;
				file_put_contents('../private/passwd', serialize($users));
				echo "OK\n";
		}
	 	 else {
			
			echo "ERROR\n";
		}
	} else {
		echo "ERROR\n";
	} 
?>
