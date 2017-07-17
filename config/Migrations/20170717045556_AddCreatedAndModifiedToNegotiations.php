<?php
use Migrations\AbstractMigration;

class AddCreatedAndModifiedToNegotiations extends AbstractMigration
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
        $table = $this->table('negotiations');
        $table
        ->addColumn('created',  'datetime')
        ->addColumn('modified', 'datetime')
        ;
        $table->update();
    }
}
