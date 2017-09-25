<?php
/**
*	Registration Form Class
*	Create and validate user registration system
*/
class RegisterForm
{
	// Default form fields
	public $form_fields = [
		[
			'name' => 'username',
			'type' => 'text',
			'label' => 'User Name'
		],

		[
			'name' => 'password',
			'type' => 'password',
			'label' => 'Password'
		]
	];

	// Create register form
	protected function generate_form(array $fields) {
		?>
		<form action="">
			<?php
			foreach ($fields as $field):
				$field = (object) $field;

				if(!isset($field->name)){
					continue;
				}

				$fieldname = (isset($field->name))? $field->name : FALSE;
				$fieldlabel = (isset($field->label))? $field->label : FALSE;
				$fieldtype = (isset($field->type))? $field->type : 'text';
				$field_description = (isset($field->description))? $field->description : $fieldname;
				$field_placeholder = (isset($field->placeholder))? $field->placeholder : FALSE;
				?>
				<div style="display: block; margin-bottom: 10px;">
					<label style="display: inline-block; padding: 5px 7px; min-width: 120px;" for="<?php echo $fieldname; ?>"><?php echo $fieldlabel; ?></label>
					<input style="display: inline-block; padding: 5px 7px; min-width: 120px;" type="<?php echo $fieldtype; ?>" title="<?php echo $field_description; ?>" placeholder="<?php echo $field_placeholder; ?>">
				</div> <!-- group-input -->
			<?php endforeach; ?>
		</form>
		<?php
	}

	// Initialize register form
	public function register_form(array $field_data = []) {
		// Merge all fields
		$form_fields = array_merge($this->form_fields, $field_data);

		// generate form
		$this->generate_form($form_fields);
	}
}

// new form fields
$new_form_field = [
	[
		'name' => 'country',
		'type' => 'text',
		'label' => 'Country',
		'placeholder' => 'Name of your country',
		'description' => 'Name of your country'
	],

	[
		'name' => 'phone',
		'type' => 'number',
		'label' => 'Mobile Number',
		'description' => 'Your Mobile Number'
	]
];

// generate form
$a = new RegisterForm;
$a->register_form($new_form_field);