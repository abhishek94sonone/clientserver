<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_queue extends CI_Migration {

    public function up()
    {
            $this->dbforge->add_field(array(
                    'id' => array(
                            'type' => 'BIGINT',
                            'constraint' => 20,
                            'unsigned' => TRUE,
                            'auto_increment' => TRUE
                    ),
                    'queue_val' => array(
                            'type' => 'VARCHAR',
                            'constraint' => '100',
                    ),
                    'status' => array(
                            'type' => 'TINYINT',
                            'default' => 0,
                    ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('queue');
    }

    public function down()
    {
            $this->dbforge->drop_table('queue');
    }
}