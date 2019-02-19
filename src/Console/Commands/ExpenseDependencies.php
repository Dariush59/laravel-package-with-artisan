<?php

namespace Phoenix\Expenses\Console\Commands;

use Illuminate\Console\Command;

class ExpenseDependencies extends Command
{
   /**
    * The name and signature of the console command.
    *
    * @var string
    */
   protected $signature = 'expense:dependencies';

   /**
    * The console command description.
    *
    * @var string
    */
   protected $description = 'Import all third party data to the current database. !!! From Expense Package !!!';



   /**
    * Create a new command instance.
    *
    * @return void
    */
   public function __construct()
   {
       parent::__construct();
   }

   /**
    * Execute the console command.
    *
    * @return mixed
    */
   public function handle()
   {
       print_r("\n *Importing Expense PayOut Types* \n");
       print_r(resolve('payOutType')->import());

   }
}
