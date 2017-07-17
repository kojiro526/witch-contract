<?php
use Migrations\AbstractMigration;

class CreateNegotiation extends AbstractMigration
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
        ->addColumn('person_id', 'integer', ['null' => false])
        ->addColumn('negotiated_at', 'date', ['null' => false])
        ->addColumn('body', 'text', ['null' => false])
        ->addForeignKey('person_id', 'persons', 'id') 
        ;
        $table->create();
    }
}
