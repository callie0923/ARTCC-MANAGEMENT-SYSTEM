<?php

namespace App\Console\Commands;

use App\Models\ARTCC\UserCert;
use App\Models\Entrust\Role;
use App\Models\Entrust\RolesToUsers;
use App\Models\System\Rating;
use App\Models\System\Settings;
use App\Models\User;
use Illuminate\Console\Command;

class InitialSetup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initial Setup of the Site';

    /**
     * Create a new command instance.
     *
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
        $settings = Settings::find(1);
        if(!$settings) {
            $settings = new Settings;
        }
        $artccCode = $this->ask('Please Enter the 3 letter code of your ARTCC..');
        if(strlen($artccCode) != 3) {
            $this->error('Whoops, that was\'nt 3 characters long, try again!..');
            $artccCode = $this->ask('Please Enter the 3 letter code of your ARTCC..');
        }

        $settings->artcc_code = $artccCode;
        $settings->vatusa_uls_key = $this->ask('Please Enter your VATUSA ULS Key..');
        $settings->vatusa_api_key = $this->ask('Please Enter your VATUSA API Key..');

        $settings->wx_nex_gen_radar = 'http://www.weather.unisys.com/radar/wrad_se.gif';
        $settings->wx_vis_radar = 'http://www.weather.unisys.com/satellite/sat_vis_se_loop-12.gif';
        $settings->wx_infrared_radar = 'http://www.weather.unisys.com/satellite/sat_ir_enh_se_loop-12.gif';
        $settings->wx_wind_surface_data = 'http://weather.unisys.com/surface/sfc_se.gif';

        $settings->save();

        $this->info('Settings complete, now time to setup the inital user...');

        $cid = $this->ask('Please enter your CID..');
        $user = new User;
        $user->id = $cid;
        $user->first_name = $this->ask('Please enter your first name..');
        $user->last_name = $this->ask('Please enter your last name..');
        $user->email = $this->ask('Please enter your email..');
        $rating = Rating::where('rating_short', $this->ask('Please enter your rating in 2 digit form.. (S1, S2, S3) etc etc...'))->first();
        $user->rating_id = $rating->id;
        $user->can_train = 1;
        $user->visitor = 0;
        $user->status = 0;
        $user->save();
        UserCert::create([
            'user_id' => $cid
        ]);

        $this->info('Time to set your role on the site...');

        $role = Role::where('name', strtolower($this->ask('Please input the short code for your role (atm, datm, wm) etc..')))->first();
        RolesToUsers::create([
            'user_id' => $cid,
            'role_id' => $role->id
        ]);
        $this->info('Setup complete');
    }
}
