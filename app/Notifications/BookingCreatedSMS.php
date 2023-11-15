<?php

    namespace App\Notifications;

    use App\Models\Booking;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Notifications\Messages\MailMessage;
    use Illuminate\Notifications\Notification;
    use NotificationChannels\AwsSns\SnsChannel;
    use NotificationChannels\AwsSns\SnsMessage;

    class BookingCreatedSMS extends Notification
    {
        use Queueable;

        protected $booking;

        /**
         * Create a new notification instance.
         *
         * @return void
         */
        public function __construct(Booking $booking)
        {
            //
            $this->booking = $booking;
        }

        /**
         * Get the notification's delivery channels.
         *
         * @param mixed $notifiable
         * @return array
         */
        public function via($notifiable)
        {
//        return ['mail'];
            return [SnsChannel::class];
        }

        /**
         * Get the mail representation of the notification.
         *
         * @param mixed $notifiable
         * @return \Illuminate\Notifications\Messages\MailMessage
         */
        public function toMail($notifiable)
        {
//        return (new MailMessage)
//            ->line('The introduction to the notification.')
//            ->action('Notification Action', url('/'))
//            ->line('Thank you for using our application!');
        }

        /**
         * Get the array representation of the notification.
         *
         * @param mixed $notifiable
         * @return array
         */
        public function toArray($notifiable)
        {
            return [
                //
            ];
        }

        public function toSns($notifiable)
        {
            return SnsMessage::create(
                [
                    'body'          => 'Your booking on ' . $this->booking->booking_date . " " . $this->booking->booking_time . " has been confirmed.\nWallet passcode: " . $this->booking->customer_password . "\n閣下 " . $this->booking->booking_date . " " . $this->booking->booking_time . "的預約已經確認。\n錢包密碼： " . $this->booking->customer_password,
                    'transactional' => true,
                    'sender' => $this->booking->business->title,

                ]
            );
        }
    }
