<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Install_artwork extends Migration
{
	/**
	 * The name of the database table
	 *
	 * @var String
	 */
	private $table_name = 'artwork';

	/**
	 * The table's fields
	 *
	 * @var Array
	 */
	private $fields = array(
		'id' => array(
			'type' => 'INT',
			'constraint' => 11,
			'auto_increment' => TRUE,
		),
		'image' => array(
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => FALSE,
		),
		'title' => array(
			'type' => 'VARCHAR',
			'constraint' => 100,
			'null' => FALSE,
		),
		'description' => array(
			'type' => 'VARCHAR',
			'constraint' => 255,
			'null' => FALSE,
		),
		'created' => array(
			'type' => 'DATE',
			'null' => FALSE,
			'default' => '0000-00-00',
		),
		'user_id' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'price' => array(
			'type' => 'FLOAT',
			'constraint' => '4',
			'null' => FALSE,
		),
		'cat_id' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'medium_id' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'style_id' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'orientation_id' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'size_id' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'color_id' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'height' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'width' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'dimension_unit' => array(
			'type' => 'INT',
			'null' => FALSE,
		),
		'framing' => array(
			'type' => 'INT',
			'constraint' => 1,
			'null' => FALSE,
		),
		'keywords' => array(
			'type' => 'TEXT',
			'null' => FALSE,
		),
		'curator_review' => array(
			'type' => 'INT',
			'constraint' => 1,
			'null' => FALSE,
		),
		'status' => array(
			'type' => 'INT',
			'constraint' => 1,
			'null' => FALSE,
		),
		'date_uploaded' => array(
			'type' => 'DATETIME',
			'null' => FALSE,
			'default' => '0000-00-00 00:00:00',
		),
	);

	/**
	 * Install this migration
	 *
	 * @return void
	 */
	public function up()
	{
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table($this->table_name);
	}

	//--------------------------------------------------------------------

	/**
	 * Uninstall this migration
	 *
	 * @return void
	 */
	public function down()
	{
		$this->dbforge->drop_table($this->table_name);
	}

	//--------------------------------------------------------------------

}