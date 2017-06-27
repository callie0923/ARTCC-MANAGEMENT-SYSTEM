<?php

namespace App\Console\Commands;

use App\Models\ARTCC\UserCert;
use App\Models\Entrust\RolesToUsers;
use App\Models\User;
use App\VATSIM\VATUSA;
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
    protected $vatusa;

    /**
     * Create a new command instance.
     * @param VATUSA $VATUSA
     */
    public function __construct(VATUSA $VATUSA)
    {
        $this->vatusa = $VATUSA;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $roster = $this->vatusa->getRoster();
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

        //atm
        $atm_cid = (int)$roster->facility->atm;
        if(!$atm_cid == 0) {
            RolesToUsers::create([
                'user_id' => $atm_cid,
                'role_id' => 1
            ]);
        }

        //datm
        $datm_cid = (int)$roster->facility->datm;
        if(!$datm_cid == 0) {
            RolesToUsers::create([
                'user_id' => $datm_cid,
                'role_id' => 1
            ]);
        }

        //ta
        $ta_cid = (int)$roster->facility->ta;
        if(!$ta_cid == 0) {
            RolesToUsers::create([
                'user_id' => $ta_cid,
                'role_id' => 1
            ]);
        }

        //ec
        $ec_cid = (int)$roster->facility->ec;
        if(!$ec_cid == 0) {
            RolesToUsers::create([
                'user_id' => $ec_cid,
                'role_id' => 1
            ]);
        }

        //wm
        $wm_cid = (int)$roster->facility->wm;
        if(!$wm_cid == 0) {
            RolesToUsers::create([
                'user_id' => $wm_cid,
                'role_id' => 1
            ]);
        }

        //fe
        $fe_cid = (int)$roster->facility->fe;
        if(!$fe_cid == 0) {
            RolesToUsers::create([
                'user_id' => $fe_cid,
                'role_id' => 1
            ]);
        }
    }
}
