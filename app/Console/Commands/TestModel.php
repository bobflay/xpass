<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Event;

class TestModel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bob';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'X7 test command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $user = User::create([
        //     'name'=> 'Ibrahim Fleifel',
        //     'email'=> 'bob@xpertbot.online',
        //     'password'=> bcrypt('12345'),
        // ]);

        // dd($user);


        // $user = User::find(2);

        // dd($user);


        // $user = User::create([
        //     'name'=> 'Sami FLEIFEL',
        //     'email'=> 'sami@xpertbot.online',
        //     'password'=> bcrypt('12345'),
        // ]);

        // dd($user);


        // $event = Event::create([
        //     'title' => 'Test Event',
        //     'description' => 'This is a test event description.',
        //     'location' => 'Test Location',
        //     'start_date' => now(),
        //     'end_date' => now()->addDays(2),
        //     'price' => 100.00,
        //     'total_tickets' => 50,
        //     'available_tickets' => 50,
        //     'image' => 'test_image.jpg',
        //     'category' => 'Test Category',
        //     'status' => 'active',
        //     'organizer_id' => 1, // Assuming the organizer with ID 1 exists
        // ]);



        // $event = new Event();
        // $event->title = 'Xpertbot Event';
        // $event->description = 'This is a description for the Xpertbot event.';
        // $event->location = 'Xpertbot HQ';
        // $event->start_date = '2025-12-01 10:00:00';
        // $event->end_date = '2025-12-01 18:00:00';
        // $event->price = 50.00;
        // $event->total_tickets = 100;
        // $event->available_tickets = 100;
        // $event->image = 'xpertbot_event.jpg';
        // $event->category = 'Technology';
        // $event->status = 'active';
        // $event->organizer_id = 2; 
        
        // $event->save();

        // dd($event);


        // $events = Event::all();

        // dd($events->toArray());

        // $event = Event::find(6);
        // dd($event->toArray());


        // $event = Event::findOrFail(1);
        // dd($event);


        // $event_less_than_100 = Event::wherePrice(50)->get()->toArray();
        // dd($event_less_than_100);




        // $event = Event::create([
        //     'title' => 'Elissa Concert',
        //     'description' => 'Join us for an unforgettable evening with the legendary Elissa.',
        //     'location' => 'Downtown Arena',
        //     'start_date' => '2025-12-30 21:00:00',
        //     'end_date' => '2025-12-31 00:00:00',
        //     'price' => 50.00,
        //     'total_tickets' => 100,
        //     'available_tickets' => 200,
        //     'image' => 'xpertbot_event.jpg',
        //     'category' => 'Technology',
        //     'status' => 'active',
        //     'organizer_id' => 2, 
        // ]);
        // dd("done");


        // $event = Event::where('price','50')
        //     ->get()->first();
        // dd($event->toArray());


        // $event = Event::find(7);
        // $event->available_tickets = 500;
        // $event->save();

        // dd($event->toArray());


        // $event = Event::find(7);
        // $event->delete();
        // dd("deleted");


        // Event::destroy(6);


        // $user = User::find(2);

        // dd($user->events->toArray());


        // $event = Event::find(9);
        // dd($event->organizer->toArray());


        // $user = User::find(2);
        // $event = $user->events()->create([
        //     'title'=>'Laravel Conference',
        //     'description'=>'A conference about Laravel and its ecosystem.',
        //     'location'=>'New York City',
        //     'start_date'=> '2025-11-15 09:00:00',
        //     'end_date'=> '2025-11-15 17:00:00',
        //     'price'=> 150.00,
        //     'total_tickets'=> 300,
        //     'available_tickets'=> 300,
        //     'image'=> 'laravel_conference.jpg',
        //     'category'=> 'Technology',
        //     'status'=> 'active',    
        // ]);

        // dd($event->toArray());

        // $event = Event::find(10);
        // $bookings = $event->bookings()->create([
        //     'user_id' => 2,
        //     'quantity' => 2,
        //     'total_amount' => 300.00,
        //     'booking_reference' => 'REF123456',
        //     'status' => 'confirmed',
        // ]);

        // dd($bookings->toArray());


        $user= User::with('bookings.event')->find(2);
        dd($user->toArray());





    }
}
