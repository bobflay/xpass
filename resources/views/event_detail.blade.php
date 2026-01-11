<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }} | XPass</title>
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
            max-width: 900px;
            margin: 0 auto;
        }

        header {
            text-align: center;
            margin-bottom: 40px;
            padding: 40px 20px;
        }

        header h1 {
            color: #fff;
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .back-link {
            display: inline-block;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 1rem;
            margin-bottom: 20px;
            transition: opacity 0.3s ease;
        }

        .back-link:hover {
            opacity: 0.8;
        }

        .event-detail-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
        }

        .event-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px;
            color: #fff;
        }

        .event-header h2 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .event-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            font-size: 1rem;
            opacity: 0.95;
            margin-top: 15px;
        }

        .event-meta span {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .event-body {
            padding: 40px;
        }

        .event-section {
            margin-bottom: 30px;
        }

        .event-section h3 {
            font-size: 1.5rem;
            color: #667eea;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .event-description {
            color: #555;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        .event-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #667eea;
        }

        .info-label {
            font-weight: 600;
            color: #667eea;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .info-value {
            color: #333;
            font-size: 1.1rem;
        }

        .bookings-list {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
        }

        .booking-item {
            background: #fff;
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 10px;
            border-left: 3px solid #667eea;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .booking-item:last-child {
            margin-bottom: 0;
        }

        .booking-user {
            font-weight: 600;
            color: #333;
        }

        .booking-date {
            color: #666;
            font-size: 0.9rem;
        }

        .empty-bookings {
            text-align: center;
            padding: 40px;
            color: #666;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            padding: 15px 40px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: opacity 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 1.1rem;
            display: inline-block;
            margin-top: 20px;
        }

        .btn:hover {
            opacity: 0.9;
        }

        @media (max-width: 768px) {
            header h1 {
                font-size: 2rem;
            }

            .event-header h2 {
                font-size: 1.8rem;
            }

            .event-meta {
                flex-direction: column;
                gap: 10px;
            }

            .event-body {
                padding: 30px 20px;
            }

            .event-info {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ url('/events') }}" class="back-link">← Back to Events</a>

        <div class="event-detail-card">
            <div class="event-header">
                <h2>{{ $event->title }}</h2>
                <div class="event-meta">
                    @if(isset($event->date))
                        <span>📅 {{ date('M d, Y', strtotime($event->date)) }}</span>
                    @endif
                    @if(isset($event->location))
                        <span>📍 {{ $event->location }}</span>
                    @endif
                    @if(isset($event->organizer))
                        <span>👤 {{ $event->organizer->name }}</span>
                    @endif
                </div>
            </div>

            <div class="event-body">
                <div class="event-section">
                    <h3>About this Event</h3>
                    <p class="event-description">{{ $event->description }}</p>
                </div>

                @if(isset($event->price))
                <div class="event-section">
                    <div class="event-info">
                        <div class="info-item">
                            <div class="info-label">Price</div>
                            <div class="info-value" style="font-size: 1.5rem; font-weight: 700; color: #667eea;">
                                ${{ number_format($event->price, 2) }}
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="event-section">
                    <h3>Bookings ({{ count($event->bookings) }})</h3>
                    @if(count($event->bookings) > 0)
                        <div class="bookings-list">
                            @foreach($event->bookings as $booking)
                                <div class="booking-item">
                                    <span class="booking-user">{{ $booking->user->name }}</span>
                                    <span class="booking-date">{{ date('M d, Y', strtotime($booking->created_at)) }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-bookings">
                            <p>No bookings yet. Be the first to book!</p>
                        </div>
                    @endif
                </div>

                <button class="btn">Book Now</button>
            </div>
        </div>
    </div>
</body>
</html>