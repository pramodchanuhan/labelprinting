<x-layouts.app>
    @section('title', 'All Interviews')

    @section('page-level-style')

    @endsection

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Thank You</title>
        <style>
            /* body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            } */

            .thank-you-container {
                text-align: center;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            h1 {
                color: green;
            }

            p {
                color: black;
                font-size: 18px;
                margin-top: 20px;
            }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    </head>

    <body>
        <div class="page-wrapper">

            <!-- Page Content -->
            <div class="content container-fluid">
                <section class="content">
                    <div class="card">
                        <div class="thank-you-container">
                            <h1>Thank You!</h1>
                            <p>Your bus ticket has been successfully booked.!!!</p>
                            <!-- <p>Please check the data before clicking Yes button, the entered same data will go to the Booklet.</p> -->

                            <a href="{{ route('shreesairaj.registerfrom_print', $RegisterFrom->id) }}" class="btn btn-danger">
                                <i class="fa fa-print"></i> Print
                            </a>
                            
                            <a href="{{ route('shreesairaj.registerfrom') }}" class="btn btn-success">Back</a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </body>


    @section('page-level-script')


    @endsection

</x-layouts.app>