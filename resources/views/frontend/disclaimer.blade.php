<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disclaimer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .disclaimer-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="disclaimer-container">
        <h2>Disclaimer</h2>
        <p>The Bar Council of India does not permit solicitation of work and advertising by legal practitioners and advocates. By accessing the Shardul Amarchand Mangaldas & Co. website (our website), the user acknowledges that:</p>
        <ul>
            <li>The user wishes to gain more information about us for his/her information and use. He/She also acknowledges that there has been no attempt by us to advertise or solicit work.</li>
            <li>Any information obtained or downloaded by the user from our website does not lead to the creation of the client – attorney relationship between the Firm and the user.</li>
            <li>None of the information contained in our website amounts to any form of legal opinion or legal advice.</li>
            <li>Our website uses cookies to improve your user experience. By using our site, you agree to our use of cookies. To find out more, please see our Cookies Policy & Privacy Policy.</li>
            <li>All information contained in our website is the intellectual property of the Firm.</li>
        </ul>
        <form id="disclaimer-form" method="POST" action="{{ route('accept-disclaimer') }}">
            @csrf
            <div class="form-check">
                <input type="checkbox" name="accept" class="form-check-input" id="accept-checkbox" required>
                <label class="form-check-label" for="accept-checkbox">I Accept</label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Continue to  Gogralegal</button>
        </form>
    </div>
</body>
</html>
