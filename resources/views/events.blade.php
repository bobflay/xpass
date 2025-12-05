<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XPass - Upcoming Events</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 50px;
            padding: 40px 20px;
        }

        header h1 {
            color: #fff;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            font-weight: 300;
        }

        .events-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            padding: 0 20px;
        }

        .event-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .event-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 30px;
            color: #fff;
        }

        .event-card h2 {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 10px;
            line-height: 1.3;
        }

        .event-meta {
            display: flex;
            gap: 15px;
            font-size: 0.9rem;
            opacity: 0.9;
            margin-top: 10px;
        }

        .event-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .event-body {
            padding: 25px 30px;
        }

        .event-description {
            color: #555;
            line-height: 1.6;
            font-size: 1rem;
            margin-bottom: 20px;
        }

        .event-footer {
            padding: 0 30px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .empty-state h2 {
            color: #667eea;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .empty-state p {
            color: #666;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            header p {
                font-size: 1rem;
            }

            .events-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .event-card h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>XPass Events</h1>
            <p>Discover and book amazing experiences</p>
        </header>

        @if($events && count($events) > 0)
            <div class="events-grid">
                @foreach ($events as $event)
                    <div class="event-card">
                        <div class="event-header">
                            <h2>{{ $event->title }}</h2>
                            @if(isset($event->date) || isset($event->location))
                                <div class="event-meta">
                                    @if(isset($event->date))
                                        <span>📅 {{ date('M d, Y', strtotime($event->date)) }}</span>
                                    @endif
                                    @if(isset($event->location))
                                        <span>📍 {{ $event->location }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="event-body">
                            <p class="event-description">{{ $event->description }}</p>
                        </div>
                        <div class="event-footer">
                            @if(isset($event->price))
                                <div class="event-price" style="font-size: 1.5rem; font-weight: 700; color: #667eea;">
                                    ${{ number_format($event->price, 2) }}
                                </div>
                            @endif
                            <button class="btn">Book Now</button>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <h2>No Events Available</h2>
                <p>Check back soon for exciting upcoming events!</p>
            </div>
        @endif
    </div>
</body>
</html>