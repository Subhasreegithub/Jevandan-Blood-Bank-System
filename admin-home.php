<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('img/Image.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
            color: #333;
        }

        #header {
            background-color: rgba(209, 0, 0, 0.9);
            color: white;
            padding: 25px 30px;
            text-align: center;
            font-size: 28px;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        }

        #header a {
            color: white;
            text-decoration: none;
        }

        #currentTime {
    font-size: 22px;
    font-weight: bold;
    color: #fff700;
    text-shadow: 1px 1px 5px #000;
}

        #body {
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h1 {
            margin-bottom: 40px;
            font-size: 28px;
            color: #d10000;
            background-color: rgba(255, 255, 255, 0.85);
            padding: 12px 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            width: 90%;
            max-width: 1000px;
        }

        .card {
    padding: 30px 20px;
    border-radius: 15px;
    color: white;
    font-weight: bold;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:nth-child(1) {
    background-color: #ff4d4d; /* Red */
}

.card:nth-child(2) {
    background-color: #4da6ff; /* Blue */
}

.card:nth-child(3) {
    background-color: #33cc99; /* Teal green */
}

.card:nth-child(4) {
    background-color: #ff9933; /* Orange */
}

.card:nth-child(5) {
    background-color: #a64dff; /* Purple */
}

.card a {
    color: white;
    text-decoration: none;
    font-size: 20px;
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
}


        

        
        #footer {
            background-color: rgba(209, 0, 0, 0.9);
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 50px;
            font-size: 15px;
        }

        #footer a {
            color: #fff;
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 20px;
                padding: 10px;
            }

            .card a {
                font-size: 18px;
            }

            #currentTime {
                float: none;
                display: block;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <div id="full">
        <div id="inner_full">
            <div id="header">
                <a href="admin-home.php"><b>JEVANDAN – Blood Bank Management System</b></a>
                <span id="currentTime"></span>
            </div>

            <div id="body">
                <?php
                if (!isset($_SESSION['un'])) {
                    header("Location:index.php");
                    exit();
                }
                ?>
                <h1>Welcome Admin — <span id="currentDate"></span></h1>

                <div class="card-container">
                    <div class="card">
                        <a href="donor-list.php">🩸 Donor List</a>
                    </div>
                    <div class="card">
                        <a href="recipient_list.php">👥 Recipient List</a>
                    </div>
                    <div class="card">
                        <a href="blood-bank-list.php">🏥 Blood Bank List</a>
                    </div>
                    <div class="card">
                        <a href="blood-camp-list.php">🎪 Blood Camp List</a>
                    </div>
                    <div class="card">
                        <a href="stoke-blood-list.php">📦 Stock Blood List</a>
                    </div>
                </div>
            </div>

            <div id="footer">
                <p>&copy; 2025 JEVANDAN. All rights reserved. | <a href="logout.php">Logout</a></p>
            </div>
        </div>
    </div>

    <script>
        // Date display
        const currentDate = new Date().toLocaleDateString('en-IN', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        document.getElementById('currentDate').innerText = currentDate;

        // Time live clock
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-IN', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            });
            document.getElementById('currentTime').innerText = timeString;
        }

        updateTime();
        setInterval(updateTime, 1000);
    </script>
</body>

</html>
