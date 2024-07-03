
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Page</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Cairo', sans-serif;
            background-color: #121212;
            color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .team-chart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
        }

        .header-text {
            margin-bottom: 20px;
            font-size: 2.5rem;
            color: #ffffff;
            text-align: center;
        }

        .team-chart {
            align-items: center;
            width: 100%;
        }

        .section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }

        .section.row {
            flex-direction: row;
            justify-content: center;
        }

        .group-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .group-container.row {
            flex-direction: row;
            flex-wrap: wrap;
        }

        .group-manager {
            text-align: center;
            margin-bottom: 10px;
        }

        .stores {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .card {
            background: #1e1e1e;
            border: 1px solid #333;
            padding: 10px;
            margin: 10px;
            border-radius: 8px;
            width: 100%;
            max-width: 150px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: #e0e0e0;
            font-size: 0.9rem;
        }

        .card h4 {
            font-size: 1rem;
        }

        .card p {
            font-size: 0.8rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .group-managers {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .group-manager-card {
            background: #1e1e1e;
            border: 1px solid #333;
            padding: 10px;
            margin: 10px;
            border-radius: 8px;
            width: 100%;
            max-width: 150px;
            text-align: center;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            color: #e0e0e0;
            font-size: 0.9rem;
        }

        .group-manager-card h4 {
            font-size: 1rem;
        }

        .group-manager-card p {
            font-size: 0.8rem;
        }

        .group-manager-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }

        .member-image {
            border-radius: 50%;
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .loading-spinner {
            text-align: center;
            font-size: 1.8rem;
            padding: 20px;
        }

        .divider {
            width: 100%;
            border: 1px solid #444;
            margin: 20px 0;
        }

        .small-divider {
            width: 80%;
            border: 1px solid #333;
            margin: 10px 0;
        }

        .group-name {
            font-size: 1.3rem;
            color: #ffffff;
            margin-bottom: 10px;
            text-align: center;
        }

        @media (max-width: 768px) {
            .header-text {
                font-size: 1.5rem;
            }

            .group-name {
                font-size: 1.1rem;
            }

            .card {
                max-width: 100px;
                font-size: 0.8rem;
            }

            .card h4 {
                font-size: 0.9rem;
            }

            .card p {
                font-size: 0.7rem;
            }

            .member-image {
                width: 50px;
                height: 50px;
            }
        }

        @media (max-width: 480px) {
            .header-text {
                font-size: 1.2rem;
            }

            .group-name {
                font-size: 1rem;
            }

            .card {
                max-width: 80px;
                font-size: 0.7rem;
            }

            .card h4 {
                font-size: 0.8rem;
            }

            .card p {
                font-size: 0.6rem;
            }

            .member-image {
                width: 40px;
                height: 40px;
            }
        }
    </style>
</head>
<body>
    @yield('diagramBody')
</body>
</html>    