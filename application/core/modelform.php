<?php
	class ModelForm {
		public static function create_form($fields, $action) {
			echo '<form class="form" method="POST" action="'.$action.'">';
			foreach ($fields as $field) {
				if (!is_array($field)) {
					echo '<input type="text"'.'name="'.$field .'" placeholder="'.$field.'"/>'; //input text field with correct name
					echo '<br/>';
				}
				else {
					$field_n = $field[0];
					$field_type = $field[1];
					echo '<input type="'.$field_type.'"'.'name="'.$field_n.'"/>'; //input text field with correct type and name
				}
			}
			echo '<input type="submit"></form>';
		}
	}
?>

