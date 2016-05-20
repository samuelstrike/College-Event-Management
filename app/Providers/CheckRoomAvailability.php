<?php

namespace App\Providers;
use Validator, DB;
use DateTime;
use Illuminate\Support\ServiceProvider;

class CheckRoomAvailability extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
     {

        //Validator return true if pass validation for room availability
        Validator::extend('available', function($attribute, $value, $parameters, $validator) {
            $time = explode(" - ", $value);
            
            $start = $this->change_date_format($time[0]);
            $end = $this->change_date_format($time[1]);
            
            // search for any possible clash with available events
            
            $case1 = DB::table('events')
            
                            ->where('start_time', '<=', $start)
                            ->where('end_time', '>=', $end)
                            ->count();

                            
            
            $case2 = DB::table('events')
                            

                            ->where('start_time', '<', $start)
                            ->where('end_time', '>', $end)
                            ->count();

                            
                            
            $case3 = DB::table('events')

                            ->where('start_time', '>=', $start)
                            ->where('end_time', '<=', $end)
                            ->count();

                            
                            
            $case4 = DB::table('events')

                            ->where('end_time', '>', $start)
                            ->where('end_time', '<', $end)
                            ->count();

                            
            
            $case5 = DB::table('events')
                            ->where('start_time', '>', $start)
                            ->where('start_time', '<', $end)
                            ->count();

                            
           
            $available=$case1 + $case2 + $case3 +$case4 + $case5;
             

            // if any event exist, means more than 0, return false
            if($available > 0  )
            {
                
                return false;
             }
            
            return true;
        });
        
        // check time validity
        Validator::extend('duration', function($attribute, $value, $parameters, $validator) {
            
            $time = explode(" - ", $value);
            
            $start = $this->change_date_format($time[0]);
            $end = $this->change_date_format($time[1]);
            
            if(abs(strtotime($end) - strtotime($start)) == 0)
            {
                return false;   
            }
            return true;
        });
        Validator::extend('venue', function($attribute, $value, $parameters, $validator) {
            
            $case = DB::table('events')
                            ->select('venue')
                            ->where('start_time', '>', $start);
        });
        
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
    public function change_date_format($date)
    {
        $time = \DateTime::createFromFormat('d/m/Y H:i:s', $date);
        return $time->format('Y-m-d H:i:s');
    }
}

