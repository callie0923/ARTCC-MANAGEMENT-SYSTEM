<?php

namespace App\Console\Commands;

use App\Models\User;
use App\VATSIM\VATUSARoster;
use Illuminate\Console\Command;

class ProcessRoster extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artcc:roster';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process Roster';
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
        // get current local members
        $currentRoster = User::where('visitor', 0)->where(function($q) {
            $q->where('status', 0)->orWhere('status', 2);
        })->get();
        $currentRosterArray = [];
        foreach($currentRoster as $item) {
            $currentRosterArray[] = $item->id;
        }

        // get vatusa roster
        $roster = $this->roster->getRoster();
        foreach($roster->facility->roster as $member) {
            // if already in roster, continue
            if(in_array($member->cid, $currentRosterArray)) {
                unset($currentRosterArray[array_search($member->cid, $currentRosterArray)]);
                continue;
            } else {

                //create a new user
                dump($member->fname.' '.$member->lname);

            }
        }

        // process roster removals (generally outgoing transfers as
        dump($currentRosterArray);
    }
}
