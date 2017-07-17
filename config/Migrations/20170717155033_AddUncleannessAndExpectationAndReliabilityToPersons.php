<?php
use Migrations\AbstractMigration;

class AddUncleannessAndExpectationAndReliabilityToPersons extends AbstractMigration
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
        ->addColumn('expectation', 'integer', ['null' => false, 'default' => 0, 'after' => 'status'])
        ->addColumn('reliability', 'string', ['null' => false, 'limit' => 5, 'after' => 'status' ])
        ->addColumn('uncleanness', 'integer', ['null' => false, 'default' => 0, 'after' => 'hope'])
        ;
        $table->update();
    }
}
