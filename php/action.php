<?php
	error_reporting(0);
	require("config.php");
			switch ($_GET["action"]) {
				case "list":
					$query = $database->query("SELECT id, name_maker, name, description, module FROM moduleList");
					if (!$query)  {
						jsonError($database->error);
					}
					$list = array();
					while ($item = $query->fetch_assoc()) {
						$list[] = $item;
					}
					echo json_encode($list);
				break;
				default:
					echo '{"error": "Action \'' . $_GET["action"] . $_POST["action"] . '\' unknown"}';
				break;
			}
?>