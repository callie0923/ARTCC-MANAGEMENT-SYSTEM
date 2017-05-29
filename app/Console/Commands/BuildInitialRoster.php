<?php

namespace App\Console\Commands;

use App\Models\ARTCC\UserCert;
use App\Models\User;
use App\VATSIM\VATUSARoster;
use Illuminate\Console\Command;

class BuildInitialRoster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artcc:initroster';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Initial Roster';
    protected $roster;

    /**
     * Create a new command instance.
     * @param VATUSARoster $VATUSARoster
     */
    public function __construct(VATUSARoster $VATUSARoster)
    {
        $this->roster = $VATUSARoster;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $roster = $this->roster->getRoster();
        foreach($roster->facility->roster as $member) {
            $currentUser = User::where('id', $member->cid)->first();
            if(!$currentUser) {

                User::create([
                    'id' => $member->cid,
                    'first_name' => $member->fname,
                    'last_name' => $member->lname,
                    'email' => $member->email,
                    'rating_id' => $member->rating,
                    'visitor' => 0,
                    'status' => 0
                ]);
                UserCert::create([
                    'user_id' => $member->cid
                ]);

            }
        }
    }
}
