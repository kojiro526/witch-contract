<?php
use Migrations\AbstractMigration;

class CreatePersons extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('persons');
        $table
        ->addColumn('name', 'string', ['null' => false, 'limit' => 20])
        ->addColumn('age', 'integer', ['null' => false, 'default' => 0 ])
        ->addColumn('status', 'integer', ['null' => false, 'default' => 0 ])
        ->addColumn('hope', 'integer', ['null' => false, 'default' => 0 ])
        ->addColumn('created',  'datetime')
        ->addColumn('modified', 'datetime')
        ;
        $table->create();
    }
}
