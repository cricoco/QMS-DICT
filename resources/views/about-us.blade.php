<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .home-bg {
            text-align: center;
            background-color: #dddddd;
        }

            .home-bg li {
            display: inline;
            float: left;
        }


            .home-bg a {
            display: block;
            padding: 8px;
            background-color: #dddddd;
        }

            .display-docs {
            text-align: center;
            font-size: 30px;
        }
    </style>
    <title>About Us</title>
   
</head>
<body>
    <div class="home-bg">
        <ul>
            <li><a href="{{ route('home') }}" style="margin-right: 950px;">Home</a></li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        

        </ul>
    </div>
        
    <div class="display-docs">
    Mission

“DICT of the people and for the people.”

The Department of Information and Communications Technology commits to:

Provide every Filipino access to vital ICT infostructure and services
Ensure sustainable growth of Philippine ICT-enabled industries resulting to creation of more jobs
Establish a One Digitized Government, One Nation
Support the administration in fully achieving its goals
Be the enabler, innovator, achiever and leader in pushing the country’s development and transition towards a world-class digital economy
Vision

“An innovative, safe and happy nation that thrives through and is enabled by Information and Communications Technology.”

DICT aspires for the Philippines to develop and flourish through innovation and constant development of ICT in the pursuit of a progressive, safe, secured, contented and happy Filipino nation.

Core Values

D – Dignity
I – Integrity
C – Competency and Compassion
T – Transparency
    </div>
</body>
</html>